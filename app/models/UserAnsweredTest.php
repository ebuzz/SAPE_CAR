<?php

class UserAnsweredTest extends Eloquent
{
    protected $table = "usersansweredtests";
    
    public $primaryKey = "idUserAnsweredTest";
    
    /**************************************************************************
    *                              Relaciones
    **************************************************************************/
    public function profile()
    {
        return $this->belongsTo('Profile', 'idProfileAtMoment', 'idProfile');
    }
    
    public function user()
    {
        return $this->belongsTo('User', 'idUser', 'idUser');
    }
    
    public function test()
    {
        return $this->belongsTo('Test', 'idTest', 'idTest');
    }
    
    public function userAnswers()
    {
        return $this->hasMany('UserAnswer', 'idUserAnsweredTest', 'idUserAnsweredTest');
    }
}