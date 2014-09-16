<?php

class ProfileHelper
{
    /**
    * Obtiene la información del útimo perfil de un usuario
    *
    * @param User $user usuario del cual obtener la información de su 
                        último perfil
    * @return array arreglo que contiene la información del perfil
    */
    public static function getUserLastProfileData($user)
    {
        return self::getProfileData($user->lastProfile);
    }
    
    /**
    * Obtiene la información de un perfil 
    *
    * @param Profile $profile perfil del cual obtener los datos
    * @return array arreglo que contiene la información del perfil
    */
    public static function getProfileData($profile)
    {
        $profile->load
        (
            'city.state.cities', 
            'city.sports', 
            'profileValues.field.values.parent',
            'profileValues.value'
        );
        
        $roles  = Role::all()->lists('description', 'idRole');
        $states = State::all()->lists('description', 'idState'); 
        $cities = $profile->city->state->cities->lists('description', 'idCity');
        $sports = $profile->city->sports->filter(function($sport)
        {
            return $sport->description != "Otro";
        });
        
        $sports->add(Sport::where("description", "=", "Otro")->first());
        $sports = $sports->lists('description', 'idSport');
        
        $fields = array();
        
        foreach($profile->profileValues as $profileValue)
        {
            $parent = $profileValue->value->parent->first();
            
            self::solveParentValue($fields, $profileValue->field, $parent);
            self::addField($fields, $profileValue->field, $profileValue->value, 
                           $parent);
        }
        
        $data = array
        (
            'roles'   => $roles, 
            'states'  => $states,
            'cities'  => $cities,
            'sports'  => $sports,
            'fields'  => $fields,
            'profile' => $profile
        );
        
        return $data;
    }
    
    /**
    * Inserta un <select> encima del valor actual en caso de que este mismo
    * sea dependiente de otro
    *
    * @param array $array referencia al arreglo al cual agregar el campo
    * @param SportField $field Instancia de la pregunta o campo actual
    * @param FieldValue $parent Instancia padre del valor actual
    */
    static function solveParentValue(&$array, $field, $parent)
    {
        if ($parent != null)
        {
            $newParent = $parent->parent->first();

            if ($newParent != null)
            {
                self::solveParentValue($array, $field, $newParent);
            }
            
            self::addField($array, $field, $parent, $newParent);
        }
    }
    
    /**
    * Inserta un campo con su rango de valores
    *
    * @param array $array referencia al arreglo al cual agregar el campo
    * @param SportField $field Instancia de la pregunta o campo actual
    * @param FieldValue $selected Instancia del valor seleccionado en el <select>
    * @param FieldValue $parentOfSelected Instancia padre del valor seleccionado
    */
    static function addField(&$array, $field, $selected, $parentOfSelected)
    {
        $level = $selected->level();
        
        $array[] = array
        (
            'name'       => $field->name,
            'id'         => 'valueOf-' . $field->idSportField . '-' . $level, 
            'selected'   => $selected->idFieldValue, 
            'values'     => $field->getValuesFromSameLevel($parentOfSelected)
                                ->lists('description', 'idFieldValue'),
            'isTopLevel' => $parentOfSelected == null
        );
    }
}