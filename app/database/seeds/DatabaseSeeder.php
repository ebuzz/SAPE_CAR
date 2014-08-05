<?php

class DatabaseSeeder extends Seeder 
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        // Módulo de Perfiles
		$this->call('StatesTableSeeder');
        $this->call('CitiesTableSeeder');
        $this->call('SportsTableSeeder');
        $this->call('SportsCitiesTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('ProfilesTableSeeder');
        
        // Módulo de Usuarios
        $this->call('GendersTableSeeder');
        $this->call('UserTypesTableSeeder');
        $this->call('UsersTableSeeder');
	}
}

/******************************************************************************
*
* Módulo de Perfiles
*
******************************************************************************/

class StatesTableSeeder()
{
    public function run()
    {
        DB::table('states')->delete();

        State::create(array
        (
            'description' -> 'Baja California'
        ));
    }
}

class CitiesTableSeeder()
{
    public function run()
    {
        DB::table('cities')->delete();

        City::create(array
        (
            'description' -> 'Baja California',
            'idState' -> '1'
        ));
    }
}

class SportsTableSeeder()
{
    public function run()
    {
        DB::table('sports')->delete();

        Sport::create(array
        (
            'description' => 'Voleibol'
        ));
    }
}

class SportsCitiesTableSeeder()
{
    public function run()
    {
        DB::table('sportscities')->delete();

        SportCity::create(array
        (
            'idSport' => '1',
            'idCity'  => '1'
        ));
    }
}

class RolesTableSeeder()
{
    public function run()
    {
        DB::table('roles')->delete();

        Role::create(array
        (
            'description' -> 'deportista'
        ));
    }
}

class ProfilesTableSeeder()
{
    public function run()
    {
        DB::table('profiles')->delete();

        Profile::create(array
        (
            'idSport' => '1',
            'idRole' => '1'
        ));
    }
}

/******************************************************************************
*
* Módulo de Usuarios
*
******************************************************************************/

class GendersTableSeeder()
{
    public function run()
    {
        DB::table('genders')->delete();

        Gender::create(array
        (
            'description' => 'Hombre'
        ));

        Gender::create(array
        (
            'description' => 'Mujer'
        ));
    }
}

class UserTypesTableSeeder()
{
    public function run()
    {
        DB::table('usertypes')->delete();

        UserType::create(array
        (
            'description' => 'Atleta'
        ));

        UserType::create(array
        (
            'description' => 'Psicólogo'
        ));
    }
}

class UsersTableSeeder()
{
    public function run()
    {
        DB::table('users')->delete();

        User::create(array
        (
            'name'          => 'Erick',
            'firstSurname'  => 'Aguayo',
            'secondSurname' => 'Velazquez',
            'email'         => 'erick.aguayo@tectijuana.edu.mx',
            'password'      => Hash::make('chingon'),
            'birthday'      => '2003-12-31',
            'idGender'      => '1',
            'idUserType'    => '2',
            'idLastProfile' => '1'
        ));
    }
}