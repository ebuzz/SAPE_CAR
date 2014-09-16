<?php
class Gender extends Eloquent
{
	protected $table = 'genders';
    
    public $primaryKey = 'idGender';
	public $timestamps = false;
}