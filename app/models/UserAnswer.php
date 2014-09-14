<?php

class UserAnswer extends Eloquent
{
    protected $table = "usersanswers";
    
    public $primaryKey = "idUserAnswer";
    public $timestamps = false;
    
    /**************************************************************************
    *                              Relaciones
    **************************************************************************/
    public function question()
    {
        return $this->belongsTo('Question', 'idQuestion', 'idQuestion');
    }
    
    public function testAnswer()
    {
        return $this->belongsTo('TestAnswer', 'idTestAnswer', 'idTestAnswer');
    }
}