<?php

class Sport extends Eloquent
{
	protected $table = 'sports';
    
    public $primaryKey = 'idSport';
	public $timestamps = false;
    
    /**************************************************************************
    *                              Relaciones
    **************************************************************************/
    public function cities()
    {
        return $this->belongsToMany('City', 'SportsCities', 'idSport', 'idCity');
    }
    
    public function fields()
    {
        return $this->hasMany('SportField', 'idSport', 'idSport');
    }
}