<?php

class HomeController extends BaseController 
{
	public function showHome()
	{
        $data = array('title' => 'Sistema de evaluación psicológica de atletas');

        return View::make('home', $data);
	}
}
