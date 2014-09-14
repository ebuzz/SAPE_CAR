<?php

class TestType extends Eloquent
{
    protected $table = "testtypes";
    
    public $primaryKey = "idTestType";
    public $timestamps = false;
    
    /**************************************************************************
    *                              Relaciones
    **************************************************************************/
    public function tests()
    {
        return $this->hasMany('Test', 'idTestType', 'idTestType');
    }
}