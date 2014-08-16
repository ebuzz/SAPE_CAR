<?php

class State extends Eloquent
{
    protected $table = "states";
    
    public $primaryKey = "idState";
    public $timestamps = false;
    
    /**************************************************************************
    *                              Relaciones
    **************************************************************************/
    public function cities()
    {
        return $this->hasMany('City', 'idState', 'idState');
    }
}