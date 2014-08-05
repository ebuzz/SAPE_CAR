<?php

class TestController extends BaseController
{
    public function showTest($testName)
    {
        $data = array('title' => $testName);
        
        return View::make('test', $data);
    }
}