<?php

class ProfileController extends BaseController
{
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
            $fields->load('values.childs');
            
            return $fields;
        }
    }
    
    public function saveProfile()
    {
        if (Request::ajax())
        {
        }
    }
}