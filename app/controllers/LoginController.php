<?php

class LoginController extends BaseController 
{
	public function showLogin()
	{	
		$data = array('title' => 'Login');
		return View::make('login',$data);
	}

	public function doLogin()
	{
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		   // run the validation rules on the inputs from the form
		 $validator = Validator::make(Input::all(), $rules);

		 // if the validator fails, redirect back to the form
		 if ($validator->fails()) {
		 	return Redirect::to('login')
		 		->withErrors($validator) // send back all errors to the login form
		 		->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		 	
		 } else {

		 	// create our user data for the authentication
		 	$userdata = array(
		 		'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);

			// attempt to do the login
			if (Auth::attempt($userdata,true)) {
				return Redirect::to('/');
				//echo 'SUCCESS!';
				// Session variables send to / 

			} else {	 	

				// validation not successful, send back to form	
				return Redirect::to('login')->with(array('message' => 'Error al iniciar sesion, verifique su correo y/o contraseña.'));
			}

		}
		//echo "Te logeaste";
	}

	public function doLogout()
	{
		Auth::logout();
		return Redirect::to('/');
		// echo "Saliste";
	}
}