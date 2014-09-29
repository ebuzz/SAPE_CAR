<?php

class UserController extends BaseController
{
	public function showUsers()
	{
		$data['title'] = "Usuarios";
		return View::make("users", $data);
	}

	public function getUsers()
	{
		$value = Input::get('term');

		$data = User::where(function($query)use($value){
			$query->where('name', 'LIKE', '%'.$value.'%')
				->orWhere('email', 'LIKE', '%'.$value.'%')
				->orWhere('firstSurname', 'LIKE', '%'.$value.'%');
		})->get();
			
		$users = [];

		for($i = 0; $i < count($data); $i++)
		{
			$users[$i]['term'] = $data[$i]['name'];
			$users[$i]['id'] = $data[$i]['idUser'];
			$users[$i]['results'] = $data[$i];

		}

		return json_encode($users);
	}

	

	public function resetPassword()
	{
		$id = Input::get("no");
		$user = User::find($id);
		$pass = $this->generatePassword();
		$newPassword = Hash::make($pass);
		
		if($id == 0)
		{
			$message['type'] = "error";
	        $message['caption'] = "Alerta!";
	        $message['content'] = "Error al reestablecer la contraseña.";

		}
		else
		{
			$user->password = $newPassword;
			$user->save();
			
	       	$message['type'] = "success";
	        $message['caption'] = "Atención!";
	        $message['content'] = "La contraseña ha sido reestablecida.";
	        $message['data']    = $pass;
		}

		
		return $message;
	}

	public function generatePassword()
	{
		 $characters = 'abcdefghijkmnopqrstuvwxyz';
		 $total = 6;
		 $password = '';
		 
		 for ($i = 0; $i < 5; $i++)
		 {
		  $password = substr(str_shuffle($characters), 0, $total);
		 }
		 
		 return $password;
	}

}

?>