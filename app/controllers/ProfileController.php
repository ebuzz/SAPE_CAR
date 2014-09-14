<?php

class ProfileController extends BaseController
{
    
    public function showProfile()
    {
        $data = ProfileHelper::getUserLastProfileData(Auth::user());
        $data['user']= User::find(Auth::id());

        $data['title'] = 'Editar mi perfil';
        return View::make('userProfile', $data);
    }

    public function showSignup()
    {
        //Check if the user has logged in.
        if (Auth::check())
        {
            // The user is logged in...
            return Redirect::to('/')->with(array('message' => 'Error, no se puede acceder a esta pagina mientras esta una sesion iniciada.'));
        }

        $data['title'] = 'Registro';
        $states         = State::all();
        $data['states'] = $states->lists('description', 'idState');
        $data['cities'] = array();//City::where('idState', '=', '1')->get()->lists('description', 'idCity');
        //City::find(2)->lists('description', 'idCity');
        $data['sports'] = array();
        $data['fields'] = array();
        $data['data'] = array();

        return View::make('signup', $data);
    }

    public function changePassword()
    {
        $message['type'] = "";
        $message['caption'] = "";
        $message['content'] = false;

        $currPass = Input::get('currPass');
        $newPass = Input::get('newPass');

        //get current user
        $user = Auth::user();

        //Validacion
        $pass = array('newPass' => $newPass);
        $validacion = array('newPass' => array('required', "min:6"));

        $validator = Validator::make($pass, $validacion);

        if(Hash::check($currPass, $user->password))
        {
            if(!$validator->fails())
            {
                $user->password = Hash::make($newPass);
                $user->save();

                $message['type'] = "success";
                $message['caption'] = "Exito!";
                $message['content'] = "Tu contraseña se ha actualizado correctamente.";
            }
            else
            {
                $message['type'] = "validation";
                $message['caption'] = "Atención!";
                $message['content'] = $validator->messages();
            }
            
        }
        else
        {
            $message['type'] = "alert";
            $message['caption'] = "Atención!";
            $message['content'] = "La contraseña actual no coincide.";
        }

        return $message;
    }

    public function saveUserProfile($id = 0)
    {
        //array for messages
        $message['type'] = "";
        $message['caption'] = "";
        $message['content'] = "";

        //generic object.
        $user = new stdClass();
        DB::beginTransaction();

        if($id != -1)
        {
            //edit User
            $user = Auth::user();

            //check user's email.
            if($user->email != Input::get('email'))
            {
                $user->email = Input::get('email');
            }
        }
        else
        {
            //new user
            $user = new User;

            $user->email = Input::get('email');
            $user->idUserType =  1;//deportista
            $user->password = Hash::make(Input::get('password'));

        }

        //if returned user is empty.
        if(empty($user))
        {
            $message['type'] = "alert";
            $message['caption'] = "Atención!";
            $message['content'] = "El usuario no existe.";

            return  $message;
        }
        /*--------Input------------*/
        $validaciones = array(
                        'name' => array(
                            'alpha',
                            'required'),
                        'firstSurname' => array(
                            'alpha',
                            'required'
                            ),
                        'email' => array(
                            'email'
                            )
                    );

        $validator = Validator::make(Input::all(), $validaciones);

        if($validator->fails())
        {
            $message['type'] = "validation";
            $message['caption'] = "Atención!";

            $mensajes = $validator->messages();

            $message['content'] = $mensajes;

            return $message;
        }
        /*--------Meat------------*/

        $user->name =  Input::get('name');
        $user->firstSurname = Input::get('firstSurname');
        $user->secondSurname = Input::get('secondSurname');
        
        
        $user->birthday = Input::get('birthday');
        $user->idGender =  Input::get('gender');
      

        if(!Auth::user()->isAdmin())
        {
            $createNew = $user->lastProfile->hasTests();
            $profile = new stdClass();

            // Crear nuevo registro de perfil para mantener el actual como historial
            if ($createNew)
            {
                // Nuevo Perfil
                $profile = new Profile;
            }
            else
            {
                $profile = $user->lastProfile;
            }
            
            $profile->idSport = Input::get('sport');
            $profile->idRole = Role::where("description", "=", "Deportista")->first()->idRole;
            $profile->idCity = Input::get('city');
            $profile->save();
            
            if($createNew)
            {
                // Attach del nuevo Perfil
                $user->idLastProfile = $profile->idProfile; 
            }
            else
            {
                // Elminación de ProfileValues
                 $profile->profileValues()->delete();
            }

            if (Input::has("values"))
            {
                // Nuevos valores de Perfil
                foreach(Input::get('values') as $value)
                {
                    $fieldValue = FieldValue::find($value);
                    $fieldValue->load('field');

                    $profileValue = new ProfileValue;
                    $profileValue->idFieldValue = $fieldValue->idFieldValue;
                    $profileValue->idSportField = $fieldValue->field->idSportField;
                    $profile->profileValues()->save($profileValue);
                }
            }
        }
        
        try 
        {
            $user->save();  
        } 
        catch (QueryException $e) 
        {
            DB::rollback();
            
            $message['type'] = "error";
            $message['caption'] = "Atención!";
            $message['content'] = $user->name.", este correo ya esta siendo utilizado.";

            return $message;
        }

        /*--------Meat------------*/
        /*--------Output------------*/

        DB::commit();

        $message['type'] = "success";
        $message['caption'] = "Exito!";
        $message['content'] = $user->name.", tus datos han sido actualizado exitosamente.";

        return $message;
    }

    public function getStates()
    {
        if (Request::ajax())
        {
            return State::all();
        }
    }
    
    public function getCities($idState)
    {
        if (Request::ajax())
        {
            return State::find($idState)->cities;
        }
    }
    
    public function getSports($idCity)
    {
        if (Request::ajax())
        {
            return City::find($idCity)->sports;
        }
    }
    
    public function getFields($idSport)
    {
        if (Request::ajax())
        {
            $fields = Sport::find($idSport)->fields;
            $fields->load('values.parent');
            
            return $fields;
        }
    }
    
    public function getChildValues($idParentValue)
    {
        if (Request::ajax())
        {
            return FieldValue::find($idParentValue)->childs;
        }
    }
    
    public function saveProfile()
    {
        if (Request::ajax())
        {
            $data = Input::all();
            $user = Auth::user();
            
            if ($user->lastProfile->hasTests())
            {
            }
            else
            {
            }
            
            // Nuevo Perfil
            $profile = new Profile;
            $profile->idSport = Input::get('sport');
            $profile->idRole = Input::get('role');
            $profile->idCity = Input::get('city');
            $profile->save();
            
            // Nuevos valores de Perfil
            foreach(Input::get('values') as $value)
            {
                $fieldValue = FieldValue::find($value);
                $fieldValue->load('field');
                
                $profileValue = new ProfileValue;
                $profileValue->idFieldValue = $fieldValue->idFieldValue;
                $profileValue->idSportField = $fieldValue->field->idSportField;
                $profile->profileValues()->save($profileValue);
            }
            
            // Attach del nuevo Perfil
            $user->idLastProfile = $profile->idProfile;
            $user->save();
        }
    }
}