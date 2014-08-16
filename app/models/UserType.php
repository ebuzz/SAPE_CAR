<?php
class UserType extends Eloquent{
	protected $table = 'usertypes';
	public $timestamps = false;

	public function user()
    {
        return $this->hasMany('UserType','idUserType','idUserType');
    }
}