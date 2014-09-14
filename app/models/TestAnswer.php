<?php

class TestAnswer extends Eloquent
{
    protected $table = "testanswers";
    
    public $primaryKey = "idTestAnswer";
    public $timestamps = false;
    
    /**************************************************************************
    *                              Relaciones
    **************************************************************************/
    public function group()
    {
        return $this->belongsTo('Group', 'idGroup', 'idGroup');
    }
}