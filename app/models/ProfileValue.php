<?php

class ProfileValue extends Eloquent
{
    protected $table = "profilevalues";
    
    public $timestamps = false;
    
    /**************************************************************************
    *                              Relaciones
    **************************************************************************/
    public function field()
    {
        return $this->hasOne('SportField', 'idSportField', 'idSportField');
    }
    
    public function value()
    {
        return $this->hasOne('FieldValue', 'idFieldValue', 'idFieldValue');
    }
    
    public function profile()
    {
        return $this->belongsTo('Profile', 'idProfile', 'idProfile');
    }
}