<?php

class Scale extends Eloquent
{
    protected $table = "scales";
    
    public $primaryKey = "idScale";
    public $timestamps = false;
    
    /**************************************************************************
    *                              Relaciones
    **************************************************************************/
    public function questions()
    {
        return $this->hasMany('Question', 'idScale', 'idScale');
    }
    
    public function ranges()
    {
        return $this->belongsToMany('Range', 'ScalesRanges', 'idScale', 'idRange');
    }
}