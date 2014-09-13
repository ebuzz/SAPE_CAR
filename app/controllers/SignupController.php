<?php

	class SignupController extends BaseController
	{
		public function showSignup()
		{
			//Check if the user has logged in.
			if (Auth::check())
			{
			    // The user is logged in...
			    return Redirect::to('/')->with(array('message' => 'Error, no se puede acceder a esta pagina mientras esta una sesion iniciada.'));
			}

			$data['title'] = 'Registro';
			$states 		= State::all();
			$data['states'] = $states->lists('description', 'idState');
			$data['cities'] = array();//City::where('idState', '=', '1')->get()->lists('description', 'idCity');
			//City::find(2)->lists('description', 'idCity');
			$data['sports'] = array();
			$data['fields'] = array();
			$data['data'] = array();

			return View::make('signup', $data);
		}

		public function register()
		{
				DB::beginTransaction();
				//Nuevo Usuario
				$user = new User;
				$user->name =  Input::get('name');
				$user->firstSurname = Input::get('firstSurname');
				$user->secondSurname = Input::get('secondSurname');
				$user->email = Input::get('email');
				$user->password = Hash::make(Input::get('password'));
				$user->birthday = Input::get('birthday');
				$user->idGender =  Input::get('gender');
				$user->idUserType =  1;//deportista
				

				// Nuevo Perfil
	            $profile = new Profile;
	            $profile->idSport = Input::get('sport');
	            $profile->idRole = 1; //atleta
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

	            $result = "/";
	            try 
	            {
	            	$user->save();	
	            } 
	            catch (QueryException $e) 
	            {
	            	DB::rollback();
	            	return $e;
	            }

	            DB::commit();
	            return $result;
			
		}
	}
?>