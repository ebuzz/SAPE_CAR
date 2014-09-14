<?php

class TestController extends BaseController
{
    public function showTest($testName)
    {
        $data = ProfileHelper::getUserLastProfileData(Auth::user());
        $data['title'] = $testName;
        $data['questions'] = $this->getQuestions($testName);
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
        {	
            $data['title'] = $testName;
        	return Redirect::to('test/'. $testName)->with(array('message' => 'El correo que ingresó no existe.'));
        }
    }
    
    private function getQuestions($testName)
    {
        $questions = array();
        $test = Test::where('name', '=', $testName)->first();
        
        if ($test != null)
        {
            $test->load('questions.group.testAnswers');
            $testQuestions = $test->questions->sortBy('number');
            
            foreach($testQuestions as $question)
            {
                $answers = array();
                
                foreach($question->group->testAnswers as $answer)
                {
                    $answers[] = array
                    (
                        'idTestAnswer' => $answer->idTestAnswer,
                        'description'  => $answer->description
                    );
                }
                      
                $questions[] = array
                (
                    'number'      => $question->number,
                    'description' => $question->description,   
                    'answers'     => $answers
                );
            }
        }
        
        return $questions;
    }

    public function submitTest()
    {
        //si se busca como psicologo un mail, no carga el arreglo questions
        $userAnsweredTest = new UserAnsweredTest;
        if($_POST['_email'] == "")
        {
            $userAnsweredTest->idUser = Auth::user()->idUser;
            $userAnsweredTest->idTest = 1;
            $userAnsweredTest->idProfileAtMoment = Auth::user()->lastProfile;
            //$userAnsweredTest->save();
            return "exito";
        }
        else
        {
            $user = User::where("email","=",$_POST['_email'])->first();
            if ($user != null)
            {
                $userAnsweredTest->idUser = user()->idUser;
                $userAnsweredTest->idTest = 1;
                $userAnsweredTest->idProfileAtMoment = user()->lastProfile;
                $userAnsweredTest->save();
            }
        }

    }
  
}