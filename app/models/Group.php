<?php

class Group extends Eloquent
{
    protected $table = "groups";
    
    public $primaryKey = "idGroup";
    public $timestamps = false;
    
    /**************************************************************************
    *                              Relaciones
    **************************************************************************/
    public function testAnswers()
    {
        return $this->hasMany('TestAnswer', 'idGroup', 'idGroup');
    }
}