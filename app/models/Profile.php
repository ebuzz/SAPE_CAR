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
    
    public function userAnsweredTest()
    {
        return $this->hasOne('UserAnsweredTest', 'idProfileAtMoment', 'idProfile');
    }
    
    public function hasTest()
    {
        return $this->userAnsweredTest != null;
    }
}