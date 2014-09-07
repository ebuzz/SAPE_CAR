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
    
    /**
    * Regresa el nivel del valor (0 = valor raiz o valor sin padre)
    *
    * @return int Valor que representa el nivel del valor
    */
    public function level()
    {
        $parent = $this->parent->first();
        $count = 0;
        
        while($parent != null)
        {
            $count++;
            
            $parent = $parent->parent->first();
        }
        
        return $count;
    }
}