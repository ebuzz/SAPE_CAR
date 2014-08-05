<?php

class HomeController extends BaseController 
{
	public function showHome()
	{
        $data = array('title' => 'Inicio');

        return View::make('home', $data);
	}
}
