<?php

class Profile extends Eloquent
{
	protected $table = 'profiles';
    
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
}