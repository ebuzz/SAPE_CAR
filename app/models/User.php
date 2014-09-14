<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface 
{
	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $primaryKey = 'idUser';
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    /**************************************************************************
    *                              Relaciones
    **************************************************************************/
    public function lastProfile()
    {
        return $this->hasOne('Profile', 'idProfile', 'idLastProfile');
    }
    
	public function userType()
    {
        return $this->belongsTo('UserType','idUserType','idUserType');
    }

    public function gender()
    {
    	return $this->belongsTo('Gender', 'idGender', 'idGender');
    }

	public function isAdmin()
	{
		$usertype = $this->userType->description;
		$admintype = "Psicólogo";
		if(strcmp($usertype,$admintype) == 0)
			return true;
		else
			return false;
	} 
}