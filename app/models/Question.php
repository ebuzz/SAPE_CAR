<?php

class Question extends Eloquent
{
    protected $table = "questions";
    
    public $primaryKey = "idQuestion";
    public $timestamps = false;
    
    /**************************************************************************
    *                              Relaciones
    **************************************************************************/
    public function test()
    {
        return $this->belongsTo('Test', 'idTest', 'idTest');
    }
    
    public function scale()
    {
        return $this->belongsTo('Scale', 'idScale', 'idScale');
    }
    
    public function group()
    {
        return $this->hasOne('Group', 'idGroup', 'idGroup');
    }
}