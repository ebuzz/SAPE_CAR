<?php

class Test extends Eloquent
{
    protected $table = "tests";
    
    public $primaryKey = "idTest";
    public $timestamps = false;
    
    /**************************************************************************
    *                              Relaciones
    **************************************************************************/
    
    public function testType()
    {
        return $this->belongsTo('TestType', 'idTestType', 'idTestType');
    }
    
    public function questions()
    {
        return $this->hasMany('Question', 'idTest', 'idTest');
    }
    
    public function scales()
    {
        return $this->hasMany('Scale', 'idTest', 'idTest');
    }
}