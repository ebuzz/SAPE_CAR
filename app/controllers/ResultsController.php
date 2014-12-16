<?php

class ResultsController extends BaseController 
{
	public function showResults()
	{
        $data = array('title' => 'Resultados');
        $data['sports'] = Sport::all()->lists('description', 'idSport');
        $data['tests']  = Test::all()->lists('name', 'idTest');

        return View::make('results', $data);
	}
    
    public function showChart()
    {
        $testID = Input::get('test');
        $test = Test::find($testID)->name;
        $data = array('test' => $test);
        
        return View::make('chart', $data);
    }
    
    public function getChartData()
    {
        $testId  = Input::get('test');
		$startDate = date('Y-m-d', strtotime(Input::get('startDate')));
		$endDate   = date('Y-m-d', strtotime(Input::get('endDate') . ' + 1 days'));
		$sportId   = Input::get("sport");
		$genderId  = Input::get("gender");
        
        $filteredTests = $this->getFilteredTests($testId, $startDate, $endDate, $sportId, $genderId);
        $test = $filteredTests['test'];
        $answeredTests = $filteredTests['answeredTests'];
        
        $ranges = $test->scales[0]->ranges;
        $scales = $test->scales;
        
        $responseData = array
        (
            'cols' => array(),
            'rows' => array()
        );
        
        // Inserción de columnas
        $responseData['cols'][] = $this->createColumn('Escalas', 'string');
        
        $ranges = $test->scales[0]->ranges;
        
        foreach ($ranges as $range)
        {
            $label = 'Deportistas en: ' . $range->description . ' (' . $range->min . ', ' . $range->max  . ')';
            $responseData['cols'][] = $this->createColumn($label, 'number');
        }

        // Preparación de datos de renglones
        $scalesResults = array();
        
        foreach ($scales as $scale)
        {
            $rangesValues = array();
            
            for ($i = 0; $i < $ranges->count(); $i++)
            {
                $rangesValues[] = 0;
            }
            
            $scalesResults[$scale->description] = $rangesValues;
        }
        
        // Cálculo de valores
        foreach($answeredTests as $answeredTest)
        {
            $resultsByScale = $this->getResultsByScale($scales, $answeredTest->userAnswers);

            foreach($resultsByScale as $resultByScale)
            {
                $scale  = $resultByScale['scale'];
                $result = $resultByScale['result'];

                $rangeIndex = $this->getRangeIndex($ranges, $result);
                $scalesResults[$scale->description][$rangeIndex]++;
            }
        }
        
        // Inserción de renglones
        foreach($scalesResults as $scaleName => $results)
        {
            $row = array();
            $row[] = $scaleName;
            
            foreach ($results as $result)
            {
                $row[] = $result;
            }
            
            $responseData['rows'][] = $this->createRow($row);
        }
        
        // Preparar encabezado y subtítulos
        $title = $test->name;
        $date = 'De ' . Input::get('startDate') . ' a ' . Input::get('endDate');
        $sport;
        $gender;
        
        if ($sportId != -1)
        {
            $sport = ' Deporte: ' . Sport::find($sportId)->description;
        }
        else
        {
            $sport = ' Deporte: Sin Especificar';
        }
        
        if ($genderId != -1)
        {   
            $gender = ' Género: ' . Gender::find($genderId)->description;
        }
        else
        {
            $gender = ' Género: Sin Especificar';
        }

        return array
        (
            'title'  => $title,
            'date'   => $date,
            'sport'  => $sport,
            'gender' => $gender,
            'table'  => $responseData
        );
    }
    
    private function createColumn($label, $type)
    {
        return array
        (
            'id'      => '', 
            'label'   => $label, 
            'pattern' => '',  
            'type'    => $type
        );
    }
    
    private function createRow($values)
    {
        $row = array('c' => array());
        
        foreach ($values as $value)
        {
            $row['c'][] = array('v' => $value,  'f' => null);
        }
        
        return $row;
    }
    
    private function getRangeIndex($ranges, $value)
    {
        for ($i = 0; $i < $ranges->count(); $i++)
        {
            $range = $ranges[$i];
            
            if ($value >= $range->min && $value <= $range->max)
            {
                return $i;
            }
        }
        
        return -1;
    }
    
    public function getResults()
    {
        $testName  = Input::get('testName');
		$startDate = date('Y-m-d', strtotime(Input::get('startDate')));
		$endDate   = date('Y-m-d', strtotime(Input::get('endDate') . ' + 1 days'));
		$sportId   = Input::get("sport");
		$genderId  = Input::get("gender");
        
        return $this->getPreparedData($testName, $startDate, $endDate, $sportId, $genderId);
    }
    
    private function getFilteredTests($testId, $startDate, $endDate, $sportId, $genderId)
    {
        $test = Test::where('idTest', '=', $testId)->with('scales.ranges')->first(); 
        
        // Filtrado (Test)
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
        
        $answeredTests = $query->with
        (
            'profile', 
            'user.gender', 
            'test.scales.ranges', 
            'userAnswers.question.scale', 
            'userAnswers.testAnswer'
        )->get();
        
        return array(
            'test'          => $test,
            'answeredTests' => $answeredTests
        );
    }

	private function getPreparedData($testId, $startDate, $endDate, $sportId, $genderId)
	{
        $filteredTests = $this->getFilteredTests($testId, $startDate, $endDate, $sportId, $genderId);
        $test = $filteredTests['test'];
        $answeredTests = $filteredTests['answeredTests'];

        $data = array();
        $preparedData = array();

        //default columns
        $columns = 
            array(
                    array('data' => 'name', 'title' => 'Nombre'),
                    array('data' => 'firstSurname', 'title' => 'Apellido Paterno'),
                    array('data' => 'secondSurname', 'title' => 'Apellido Materno'),
                    array('data' => 'birthday', 'title' => 'Edad'),
                    array('data' => 'genero', 'title' => 'Género'),
                );

        //Scales
        $tempcol = $test->scales->lists('description');
        $colIndex = COUNT($columns); //columns array index.

        for($i = 0; $i < COUNT($tempcol); $i++)
        {
            $columns[$colIndex]['data'] = $tempcol[$i];
            $columns[$colIndex]['title'] = $tempcol[$i];
            $colIndex++;
        }

        $data['columns'] = $columns;

        foreach($answeredTests as $answeredTest)
        {
            $scales = $answeredTest->test->scales;
            $userAnswers = $answeredTest->userAnswers;
            
            $id = $answeredTest->idUserAnsweredTest;
            $preparedData[$id]['answeredTest'] = $answeredTest;
            $preparedData[$id]['resultsByScale'] = $this->getResultsByScale($scales, $userAnswers);
        }
     
        $today = new DateTime("now");
        
        foreach($preparedData as $row)
        {
            $answeredTest = $row['answeredTest'];
            $resultsByScale = $row['resultsByScale'];
            
            $user = $answeredTest->user;
            
            $temp['name']          = $user->name;
			$temp['firstSurname']  = $user->firstSurname;
			$temp['secondSurname'] = $user->secondSurname;

            // Prepare age.
            $birthday = new DateTime($user->birthday);
            $age = $today->diff($birthday);

			$temp['birthday']      = $age->y;
			$temp['genero']        = $user->gender->description;
            
            foreach($resultsByScale as $resultByScale)
            {
                $scale  = $resultByScale['scale'];
                $result = $resultByScale['result'];
                    
                $temp[$scale->description] = $result;
            }
			
			$data['data'][] = $temp;
        }
        
        return json_encode($data);
	}
    
    private $cachedArray = array();
    
    private function getResultsByScale($scales, $userAnswers)
    {
        unset($this->cachedArray);
        
        foreach($scales as $scale)
        {
            $this->cachedArray[$scale->idScale]['scale'] = $scale;
            $this->cachedArray[$scale->idScale]['result'] = 0;
        }
        
        foreach($userAnswers as $userAnswer)
        {
           $this->cachedArray[$userAnswer->question->scale->idScale]['result'] += $userAnswer->testAnswer->number;
        }
        
        return $this->cachedArray;
    }
}