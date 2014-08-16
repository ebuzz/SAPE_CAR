<?php

class FieldChildValue extends Eloquent
{
    protected $table = "fieldchildvalues";
    
    public $timestamps = false;
    
    /**************************************************************************
    *                              Relaciones
    **************************************************************************/
    public function parent()
    {
        return $this->hasOne('FieldValue', 'idFieldValue', 'idParentValue');
    }
    
    public function child()
    {
        return $this->hasOne('FieldValue', 'idFieldValue', 'idChildValue');
    }
}