<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class DeleteUser extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'deleteuser';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Elimina un usuario con todos sus datos (tests, respuestas y perfiles)';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        $idUser= $this->ask('Id del Usuario: ');
        
        $user = User::find($idUser);
        
        if ($user != null)
        {
            $this->info('');
            $this->info('Nombre: ' . $user->name . ' ' . $user->firstSurname . ' ' . $user->secondSurname);
            $this->info('Correo: ' . $user->email);
            $this->info('');
            
            if ($this->confirm('Deseas eliminar al usuario? (yes|no)', false))
            {
                $profiles = array();
                
                foreach ($user->answeredTests as $test)
                {
                    $test->userAnswers()->delete();
                    $profiles[] = $test->profile;
                }
                
                $user->answeredTests()->delete();
                
                $profiles[] = $user->lastProfile;
                $user->delete();
                
                foreach ($profiles as $profile)
                {
                    $profile->profileValues()->delete();
                    $profile->delete();
                }
                
                $this->info('ELIMINADO!');
            }
            else
            {
                $this->info('Operacion cancelada');
            }
        }
        else
        {
            $this->error('El usuario no existe!');
        }
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
		);
	}

}
