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
            
            if ($user->lastProfile->hasTest())
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