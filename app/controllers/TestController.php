<?php

class TestController extends BaseController
{ 
    public function showTest($testName)
    {
        $data = array('name' => $testName);
        $rules = array('name' => 'exists:tests,name');

        $validator = Validator::make($data, $rules);

        $data['validator'] = "Bien";
        $data['title'] = $testName;

        if($validator->fails())
        {
            return Redirect::to('/');
        }
        
        if (!Auth::user()->isAdmin())
        {
            $data['profileData'] = ProfileHelper::getUserLastProfileData(Auth::user());
            $data['profileData']['user'] = Auth::user();
            $data['questions'] = $this->getQuestions($testName);
        }
        
        if (Session::has('athleteEmail'))
        {
            Session::forget('athleteEmail');
        }
        
        return View::make('test', $data);
    }

    public function doSearch($testName)
    {
    	$userEmail = Input::get('email');
    	$user = User::where("email", "=", $userEmail)->first();

        if($user != null)
        {
            if (!$user->isAdmin())
            {
                $data['title'] = $testName;
                Session::put('athleteEmail', $user->email);

                $data['profileData'] = ProfileHelper::getUserLastProfileData($user);
                $data['profileData']['user'] = $user;
                $data['questions'] = $this->getQuestions($testName);

                return View::make('test', $data);
            }
            else
            {
                $data['title'] = $testName;
            
        	   return Redirect::to('test/'. $testName)->with(array('message' => 'Debes de ingresar el correo de un deportista.'));
            }
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

    public function submitTest($testName)
    {
        $test = Test::where("name", "=", $testName)->first();
        $user = null;
        
        if (Session::has('athleteEmail'))
        {
            $email = Session::get('athleteEmail');
            Session::forget('athleteEmail');
            
            $user = User::where("email", "=", $email)->first();
        }
        else
        {
            $user = Auth::user();
        }
        
        if ($user != null && $test != null)
        {
            $userAnsweredTest = new UserAnsweredTest;
            $userAnsweredTest->idUser = $user->idUser;
            $userAnsweredTest->idTest = $test->idTest;
            $userAnsweredTest->idProfileAtMoment = $user->idLastProfile;
            $userAnsweredTest->save();
            
            $questions = $test->questions->sortBy("number");
            
            // Respuestas
            foreach(Input::except('_token') as $input => $answer)
            {
                $splited = explode("-", $input);
                $questionNumber = end($splited);
                
//                echo $questionNumber;
                
                $question = $questions->filter(function($value) use($questionNumber)
                {
                    return $value->number == $questionNumber;
                })->first();
                
                $userAnswer = new UserAnswer;
                $userAnswer->idQuestion = $question->idQuestion;
                $userAnswer->idTestAnswer = $answer;
                $userAnsweredTest->userAnswers()->save($userAnswer);
            }

            return Redirect::to('test/'. $testName)->with(array('testSuccessMessage' => 'Gracias, el cuestionario se ha registrado exitosamente!'));
        }
        else
        {
            return Redirect::to('test/'. $testName)->with(array('testErrorMessage' => 'Lo sentimos, ha ocurrido un error al registrar el cuestionario.'));
        }
    }
}