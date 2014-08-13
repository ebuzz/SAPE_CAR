<?php

class City extends Eloquent
{
	protected $table = 'cities';
    
    public $primaryKey = 'idCity';
	public $timestamps = false;
    
    /**************************************************************************
    *                              Relaciones
    **************************************************************************/
    public function state()
    {
        return $this->belongsTo('State', 'idState', 'idState');
    }
    
    public function sports()
    {
        return $this->belongsToMany('Sport', 'SportsCities', 'idCity', 'idSport');
    }
}