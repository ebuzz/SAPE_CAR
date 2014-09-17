<?php

class ResultsController extends BaseController 
{
	public function showResults()
	{
        $data = array('title' => 'Resultados');
        $data['sports'] = Sport::all()->lists('description', 'idSport'); 

        return View::make('results', $data);
	}

	public function getResults()
	{
		$testName  = Input::get('testName');
		$startDate = date('Y-m-d', strtotime(Input::get('startDate')));
		$endDate   = date('Y-m-d', strtotime(Input::get('endDate') . ' + 1 days'));
		$sportId   = Input::get("sport");
		$genderId  = Input::get("gender");

		$data = array();
        
        // Filtrado (Test)
        $test = Test::where('name', '=', $testName)->first();   
        $query = UserAnsweredTest::whereHas('test', function($query) use($test)
        {          
            $query->where('idTest', '=', $test->idTest);
        });
        
        // Filtrado (Fecha)
        $query->whereBetween('created_at', array($startDate, $endDate));
        
        // Filtrado (Deporte)
        if ($sportId != -1)
        {
            $query->whereHas('profile', function($query) use($sportId)
            {          
                $query->where('idSport', '=', $sportId);
            });
        }
        
        // Filtrado (Género)
        if ($genderId != -1)
        {   
            $query->whereHas('user', function($query) use($genderId)
            {
                $query->where('idGender', '=', $genderId);
            });
        }
        
        $answeredTests = $query->get();
        
        $answeredTests->load('profile');
        $answeredTests->load('user.gender');
        $answeredTests->load('test.scales');
        $answeredTests->load('test.scales.ranges');
        $answeredTests->load('userAnswers.question.scale');
        $answeredTests->load('userAnswers.testAnswer');
        
        $preparedData = array();
        
        foreach($answeredTests as $answeredTest)
        {
            $scales = $answeredTest->test->scales;
            $userAnswers = $answeredTest->userAnswers;
            
            $id = $answeredTest->idUserAnsweredTest;
            $preparedData[$id]['answeredTest'] = $answeredTest;
            $preparedData[$id]['resultsByScale'] = $this->getResultsByScale($scales, $userAnswers);
        }
        
        foreach($preparedData as $row)
        {
            $answeredTest = $row['answeredTest'];
            $resultsByScale = $row['resultsByScale'];
            
            $user = $answeredTest->user;
            
            $temp['name']          = $user->name;
			$temp['firstSurname']  = $user->firstSurname;
			$temp['secondSurname'] = $user->secondSurname;
			$temp['birthday']      = $user->birthday;
			$temp['genero']        = $user->gender->description;
            
            foreach($resultsByScale as $resultByScale)
            {
                $scale  = $resultByScale['scale'];
                $result = $resultByScale['result'];
                    
                $temp[$scale->description] = $result;
            }
			
			$data[] = $temp;
        }

		return json_encode($data);
	}
    
    private function getResultsByScale($scales, $userAnswers)
    {
        $temp = array();
        
        foreach($scales as $scale)
        {
            $temp[$scale->idScale]['scale'] = $scale;
            $temp[$scale->idScale]['result'] = 0;
        }
        
        foreach($userAnswers as $userAnswer)
        {
           $temp[$userAnswer->question->scale->idScale]['result'] += $userAnswer->testAnswer->number;
        }
        
        return $temp;
    }
}