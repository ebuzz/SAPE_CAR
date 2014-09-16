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
		$test 				= Input::get('test');
		$fechaInicial 		= Input::get('fechainicial');
		$fechaFinal 		= Input::get('fechafinal');
		$deporte 			= Input::get("deporte");
		$sexo 				= Input::get("genero");

		$data = array();
		$users = User::all();
		$users->load('gender');
		
		for ($i=0; $i < count($users)-1; $i++) { 
			
			$temp['name'] = $users[$i]['name'];
			$temp['firstSurname'] = $users[$i]['firstSurname'];
			$temp['secondSurname'] = $users[$i]['secondSurname'];
			$temp['birthday'] = $users[$i]['birthday'];
			$temp['genero']  = $users[$i]['gender']['description'];
			$temp['aconfianza'] = 100;
			$temp['anegativo'] = 95;
			$temp['atencional'] = 99;
			$temp['vimaginativo'] = 98;
			$temp['nmotivacion'] = 97;
			$temp['apositivo'] = 96;
			$temp['autestima'] = 94;
			
			$data[] = $temp;
		}

		//return $users;
		return json_encode($data);
	}
}
?>