<?php

class Range extends Eloquent
{
    protected $table = "ranges";
    
    public $primaryKey = "idRange";
    public $timestamps = false;
    
    /**************************************************************************
    *                              Relaciones
    **************************************************************************/
    public function scales()
    {
        return $this->belongsToMany('Scale', 'ScalesRanges', 'idRange', 'idScale');
    }
}