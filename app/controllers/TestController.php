<?php

class TestController extends BaseController
{
    public function showTest($testName)
    {
        $data = ProfileHelper::getUserLastProfileData(Auth::user());
        $data['title'] = $testName;
        $data['email'] = "";
        return View::make('test', $data);
    }

    public function doSearch($testName)
    {
    	$userEmail = array('email' 	=> Input::get('email'));
    	$user = User::where("email","=",$userEmail)->first();

        if($user != null)
        {
        	$data = ProfileHelper::getUserLastProfileData($user);
        	$data['title'] = $testName;

        	$data['email'] = Hash::make($user["email"]);
        	return View::make('test', $data);
        }
        else
        {	$data['title'] = $testName;
        	return Redirect::to('test/'. $testName)->with(array('message' => 'El correo que ingresó no existe.'));
        }
    }
}