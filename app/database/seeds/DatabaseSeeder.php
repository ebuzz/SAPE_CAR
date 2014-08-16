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
        $this->call('SportsFieldsTableSeeder');
        $this->call('FieldValuesTableSeeder');
        $this->call('FieldChildValuesTableSeeder');
        $this->call('ProfileValuesTableSeeder');
        
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

class StatesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('states')->delete();

        State::create(array
        (
            'description' => 'Baja California'
        ));
        
        State::create(array
        (
            'description' => 'Jalisco'
        ));
    }
}

class CitiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cities')->delete();

        City::create(array
        (
            'description' => 'Tijuana',
            'idState'     => '1'
        ));
        
        City::create(array
        (
            'description' => 'Rosarito',
            'idState'     => '1'
        ));
        
        City::create(array
        (
            'description' => 'Guadalajara',
            'idState'     => '2'
        ));
        
        City::create(array
        (
            'description' => 'Zapopan',
            'idState'     => '2'
        ));
    }
}

class SportsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sports')->delete();

        Sport::create(array('description' => 'Voleibol'));
        Sport::create(array('description' => 'Clavados'));
        Sport::create(array('description' => 'Ciclismo'));
    }
}

class SportsCitiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sportscities')->delete();

        // Tijuana - Voleibol
        SportCity::create(array
        (
            'idSport' => '1',
            'idCity'  => '1'
        ));
        
        // Tijuana - Clavados
        SportCity::create(array
        (
            'idSport' => '2',
            'idCity'  => '1'
        ));
        
        // Tijuana - Ciclismo
        SportCity::create(array
        (
            'idSport' => '3',
            'idCity'  => '1'
        ));
        
        // Rosarito - Voleibol
        SportCity::create(array
        (
            'idSport' => '1',
            'idCity'  => '2'
        ));
        
        // Guadalajara - Voleibol
        SportCity::create(array
        (
            'idSport' => '1',
            'idCity'  => '3'
        ));
        
        // Zapopan - Clavados
        SportCity::create(array
        (
            'idSport' => '2',
            'idCity'  => '4'
        ));
        
        // Zapopan - Ciclismo
        SportCity::create(array
        (
            'idSport' => '3',
            'idCity'  => '4'
        ));
    }
}

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->delete();

        Role::create(array('description' => 'Deportista'));
        Role::create(array('description' => 'Entrenador'));
        Role::create(array('description' => 'Psicólogo'));
        Role::create(array('description' => 'Personal administrativo'));
    }
}

class ProfilesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('profiles')->delete();

        Profile::create(array
        (
            'idSport' => '2',
            'idRole'  => '1',
            'idCity'  => '4'
        ));
        
        Profile::create(array
        (
            'idSport' => '3',
            'idRole'  => '1',
            'idCity'  => '1'
        ));
    }
}

class SportsFieldsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sportfields')->delete();
        
        // Campos de Voleibol
        SportField::create(array('name' => 'Rama','idSport' => '1'));
        SportField::create(array('name' => 'Escolaridad','idSport' => '1'));
        SportField::create(array('name' => 'Categoría','idSport' => '1'));
        SportField::create(array('name' => 'Posición','idSport' => '1'));
        
        // Campos de Clavados
        SportField::create(array('name' => 'Rama','idSport' => '2'));
        SportField::create(array('name' => 'Escolaridad','idSport' => '2'));
        SportField::create(array('name' => 'Categoría','idSport' => '2'));
        
        // Campos de Ciclismo
        SportField::create(array('name' => 'Escolaridad','idSport' => '3'));
        SportField::create(array('name' => 'Competencias o pruebas','idSport' => '3'));
    }
}

class FieldValuesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('fieldvalues')->delete();
        
        // Valores de Voleibol - Rama
        FieldValue::create(array('idSportField' => '1', 'description' => 'Femenil'));
        FieldValue::create(array('idSportField' => '1', 'description' => 'Varonil'));
        
        // Valores de Voleibol - Escolaridad
        FieldValue::create(array('idSportField' => '2', 'description' => 'Primaria'));
        FieldValue::create(array('idSportField' => '2', 'description' => 'Secundaria'));
        FieldValue::create(array('idSportField' => '2', 'description' => 'Preparatoria'));
        FieldValue::create(array('idSportField' => '2', 'description' => 'Universidad'));
        
        // Valores de Voleibol - Categoría
        FieldValue::create(array('idSportField' => '3', 'description' => 'Infantil Mayor Sub 15'));
        FieldValue::create(array('idSportField' => '3', 'description' => 'Juvenil Menor Sub 17'));
        FieldValue::create(array('idSportField' => '3', 'description' => 'Juvenil Mayor Sub 19'));
        FieldValue::create(array('idSportField' => '3', 'description' => 'Juvenil Superior Sub 21'));
        
        // Valores de Voleibol - Posición
        FieldValue::create(array('idSportField' => '4', 'description' => 'Libero'));
        FieldValue::create(array('idSportField' => '4', 'description' => 'Central'));
        FieldValue::create(array('idSportField' => '4', 'description' => 'Opuesto'));
        FieldValue::create(array('idSportField' => '4', 'description' => 'Colocador'));
        FieldValue::create(array('idSportField' => '4', 'description' => 'Cuatro'));
        
        
        // Valores de Natación - Rama
        FieldValue::create(array('idSportField' => '5', 'description' => 'Femenil'));
        FieldValue::create(array('idSportField' => '5', 'description' => 'Varonil'));
        
        // Valores de Natación - Escolaridad
        FieldValue::create(array('idSportField' => '6', 'description' => 'Primaria'));
        FieldValue::create(array('idSportField' => '6', 'description' => 'Secundaria'));
        FieldValue::create(array('idSportField' => '6', 'description' => 'Preparatoria'));
        
        // Valores de Natación - Categoría
        FieldValue::create(array('idSportField' => '7', 'description' => 'Grupo D (9-11)'));
        FieldValue::create(array('idSportField' => '7', 'description' => 'Grupo C (12-13)'));
        FieldValue::create(array('idSportField' => '7', 'description' => 'Grupo B (14-15)'));
        FieldValue::create(array('idSportField' => '7', 'description' => 'Grupo A (16-18)'));
        
        
        // Valores de Ciclismo - Escolaridad
        FieldValue::create(array('idSportField' => '8', 'description' => 'Primaria'));
        FieldValue::create(array('idSportField' => '8', 'description' => 'Secundaria'));
        FieldValue::create(array('idSportField' => '8', 'description' => 'Preparatoria'));
        FieldValue::create(array('idSportField' => '8', 'description' => 'Universidad'));
        
        // Valores de Ciclismo - Competencias o pruebas
        FieldValue::create(array('idSportField' => '9', 'description' => 'Ruta'));
        FieldValue::create(array('idSportField' => '9', 'description' => 'Montaña'));
        FieldValue::create(array('idSportField' => '9', 'description' => 'Pista'));
            FieldValue::create(array('idSportField' => '9', 'description' => 'Contrarreloj'));
            FieldValue::create(array('idSportField' => '9', 'description' => 'Velocidad individual : 200 metros y 500 metros'));
            FieldValue::create(array('idSportField' => '9', 'description' => 'Velocidad por equipos'));
            FieldValue::create(array('idSportField' => '9', 'description' => 'Kilómetro contrarreloj: 1000 metros varonil 500 metros femenil'));
            FieldValue::create(array('idSportField' => '9', 'description' => 'Persecución individual: 4000 metros varonil y 3000 metros femenil'));
            FieldValue::create(array('idSportField' => '9', 'description' => 'Persecución por equipos '));
            FieldValue::create(array('idSportField' => '9', 'description' => 'Carrera por puntos'));
            FieldValue::create(array('idSportField' => '9', 'description' => 'Keirin'));
            FieldValue::create(array('idSportField' => '9', 'description' => 'Scratch'));
            FieldValue::create(array('idSportField' => '9', 'description' => 'Ómnium'));
            FieldValue::create(array('idSportField' => '9', 'description' => 'Eliminación'));
            FieldValue::create(array('idSportField' => '9', 'description' => 'Madison'));
    }
}

class FieldChildValuesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('fieldchildvalues')->delete();
        
        FieldChildValue::create(array('idChildValue' => '32', 'idParentValue' => '31'));
        FieldChildValue::create(array('idChildValue' => '33', 'idParentValue' => '31'));
        FieldChildValue::create(array('idChildValue' => '34', 'idParentValue' => '31'));
        FieldChildValue::create(array('idChildValue' => '35', 'idParentValue' => '31'));
        FieldChildValue::create(array('idChildValue' => '36', 'idParentValue' => '31'));
        FieldChildValue::create(array('idChildValue' => '37', 'idParentValue' => '31'));
        FieldChildValue::create(array('idChildValue' => '38', 'idParentValue' => '31'));
        FieldChildValue::create(array('idChildValue' => '39', 'idParentValue' => '31'));
        FieldChildValue::create(array('idChildValue' => '40', 'idParentValue' => '31'));
        FieldChildValue::create(array('idChildValue' => '41', 'idParentValue' => '31'));
        FieldChildValue::create(array('idChildValue' => '42', 'idParentValue' => '31'));
        FieldChildValue::create(array('idChildValue' => '43', 'idParentValue' => '31'));
    }
}

class ProfileValuesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('profilevalues')->delete();

        // Valores prueba perfil 1 - Clavados
        ProfileValue::create(array
        (
            'idProfile'    => '1',
            'idSportField' => '5',
            'idFieldValue' => '17'
        ));
        
        ProfileValue::create(array
        (
            'idProfile'    => '1',
            'idSportField' => '6',
            'idFieldValue' => '20'
        ));
        
        ProfileValue::create(array
        (
            'idProfile'    => '1',
            'idSportField' => '7',
            'idFieldValue' => '24'
        ));
        
        // Valores prueba perfil 2 - Ciclismo
        ProfileValue::create(array
        (
            'idProfile'    => '2',
            'idSportField' => '8',
            'idFieldValue' => '27'
        ));
        
        ProfileValue::create(array
        (
            'idProfile'    => '2',
            'idSportField' => '9',
            'idFieldValue' => '41'
        ));
    }
}

/******************************************************************************
*
* Módulo de Usuarios
*
******************************************************************************/

class GendersTableSeeder extends Seeder
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

class UserTypesTableSeeder extends Seeder
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

class UsersTableSeeder extends Seeder
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
            'idLastProfile' => '2'
        ));
    }
}