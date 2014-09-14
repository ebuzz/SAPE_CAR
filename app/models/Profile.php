<?php

class Profile extends Eloquent
{
	protected $table = 'profiles';
    
    public $primaryKey = 'idProfile';
    
    /**************************************************************************
    *                              Relaciones
    **************************************************************************/
    public function role()
    {
        return $this->hasOne('Role', 'idRole', 'idRole');
    }
    
    public function sport()
    {
        return $this->hasOne('Sport', 'idSport', 'idSport');
    }
    
    public function city()
    {
        return $this->hasOne('City', 'idCity', 'idCity');
    }
    
    public function profileValues()
    {
        return $this->hasMany('ProfileValue', 'idProfile', 'idProfile');
    }
    
    public function userAnsweredTests()
    {
        return $this->hasMany('UserAnsweredTest', 'idProfileAtMoment', 'idProfile');
    }
    
    public function hasTests()
    {
        return $this->userAnsweredTests->count() > 0;
    }
}