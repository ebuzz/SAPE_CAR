<?php

class FieldValue extends Eloquent
{
    protected $table = "fieldvalues";
    
    public $primaryKey = 'idFieldValue';
    public $timestamps = false;
    
    /**************************************************************************
    *                              Relaciones
    **************************************************************************/
    public function parent()
    {
        return $this->belongsToMany('FieldValue', 'FieldChildValues', 'idChildValue', 'idParentValue');
    }
    
    public function childs()
    {
        return $this->belongsToMany('FieldValue', 'FieldChildValues', 'idParentValue', 'idChildValue');
    }
}