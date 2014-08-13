<?php

class TestController extends BaseController
{
    public function showTest($testName)
    {
        $data = ProfileHelper::getUserLastProfileData(Auth::user());
        $data['title'] = $testName;
        
        return View::make('test', $data);
    }
}