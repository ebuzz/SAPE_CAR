<?php

class SportField extends Eloquent
{
    protected $table = "sportfields";
    
    public $timestamps = false;
    
    /**************************************************************************
    *                              Relaciones
    **************************************************************************/
    public function sport()
    {
        return $this->belongsTo('Sport', 'idSport', 'idSport');
    }
    
    public function values()
    {
        return $this->hasMany('FieldValue', 'idSportField', 'idSportField');
    }
    
    public function getValuesFromSameLevel($parent)
    {
        return $this->values->filter(function($value) use($parent)
        {
            $valueParent = $value->parent->first();
            
            if ($valueParent == null && $parent == null)
            {
                return true;
            }
            else if ($valueParent == null || $parent == null)
            {
                return false;
            }
            
            return $valueParent->idFieldValue == $parent->idFieldValue;
        });
    }
}