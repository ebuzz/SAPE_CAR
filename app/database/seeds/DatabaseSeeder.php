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

        $this->fillDatabase();
	}
    
    private function fillDatabase()
    {
        // Módulo de Perfiles
        $this->call('StatesTableSeeder');
        $this->call('CitiesTableSeeder');
        $this->call('SportsTableSeeder');
        $this->call('SportsCitiesTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('SportsFieldsTableSeeder');
        $this->call('FieldValuesTableSeeder');
        $this->call('FieldChildValuesTableSeeder');

        // Módulo de Usuarios
        $this->call('GendersTableSeeder');
        $this->call('UserTypesTableSeeder');
        $this->call('UsersTableSeeder');

        // Módulo de Tests
        $this->call('TestTypesTableSeeder');
        $this->call('IPRDSeeder');
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
        Sport::create(array('description' => 'Tiro con arco'));
        Sport::create(array('description' => 'Esgrima'));
        Sport::create(array('description' => 'Canotaje'));
        Sport::create(array('description' => 'Tiro deportivo'));
        Sport::create(array('description' => 'Bádminton'));
        Sport::create(array('description' => 'Natación'));
        Sport::create(array('description' => 'Tae Kwon Do'));
        Sport::create(array('description' => 'Judo'));
        Sport::create(array('description' => 'Otro'));
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
        
        // Tijuana - Tiro con arco
        SportCity::create(array
        (
            'idSport' => '4',
            'idCity'  => '1'
        ));
        
        // Tijuana - Esgrima
        SportCity::create(array
        (
            'idSport' => '5',
            'idCity'  => '1'
        ));
        
        // Tijuana - Canotaje
        SportCity::create(array
        (
            'idSport' => '6',
            'idCity'  => '1'
        ));
        
        // Tijuana - Tiro Deportivo
        SportCity::create(array
        (
            'idSport' => '7',
            'idCity'  => '1'
        ));
        
        // Tijuana - Bádminton
        SportCity::create(array
        (
            'idSport' => '8',
            'idCity'  => '1'
        ));
        
        // Tijuana - Natación
        SportCity::create(array
        (
            'idSport' => '9',
            'idCity'  => '1'
        ));
        
        // Tijuana - Tae Kwon Do
        SportCity::create(array
        (
            'idSport' => '10',
            'idCity'  => '1'
        ));
        
        // Tijuana - Judo
        SportCity::create(array
        (
            'idSport' => '11',
            'idCity'  => '1'
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
        SportField::create(array('name' => 'Categoría','idSport' => '3'));
        
        //Campos de Tiro con Arco
        SportField::create(array('name' => 'Categoría','idSport' => '4'));
        SportField::create(array('name' => 'Prueba','idSport' => '4'));

        //Campos de Esgrima
        SportField::create(array('name' => 'Categoría','idSport' => '5'));
        SportField::create(array('name' => 'Prueba','idSport' => '5'));

        //Campos de Canotaje
        SportField::create(array('name' => 'Categoría','idSport' => '6'));
        SportField::create(array('name' => 'Prueba','idSport' => '6'));
        
        // Campos de Tiro Deportivo
        SportField::create(array('name' => 'Escolaridad','idSport' => '7'));
        SportField::create(array('name' => 'Categoría','idSport' => '7'));
        SportField::create(array('name' => 'Competencias o pruebas','idSport' => '7'));
        
        // Bádminton
        SportField::create(array('name' => 'Escolaridad','idSport' => '8'));
        SportField::create(array('name' => 'Categoría','idSport' => '8'));
        SportField::create(array('name' => 'Competencias o pruebas','idSport' => '8'));
        
        // Campos de Natación
        SportField::create(array('name' => 'Categorías','idSport' => '9'));
        SportField::create(array('name' => 'Estilo principal','idSport' => '9'));
        SportField::create(array('name' => 'Tipo de pruebas','idSport' => '9'));
        
        // Tae Kwon Do
        SportField::create(array('name' => 'Modalidad','idSport' => '10'));
        SportField::create(array('name' => 'Categoría','idSport' => '10'));
        
        // Judo
        SportField::create(array('name' => 'Categoría','idSport' => '11'));
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
        
        
        // Valores de Clavados - Rama
        FieldValue::create(array('idSportField' => '5', 'description' => 'Femenil'));
        FieldValue::create(array('idSportField' => '5', 'description' => 'Varonil'));
        
        // Valores de Clavados - Escolaridad
        FieldValue::create(array('idSportField' => '6', 'description' => 'Primaria'));
        FieldValue::create(array('idSportField' => '6', 'description' => 'Secundaria'));
        FieldValue::create(array('idSportField' => '6', 'description' => 'Preparatoria'));
        
        // Valores de Clavados - Categoría
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

        // Valores Ciclismo - Categoria
        FieldValue::create(array('idSportField' => '10', 'description' => 'Juvenil A'));
        FieldValue::create(array('idSportField' => '10', 'description' => 'Juvenil B'));
        FieldValue::create(array('idSportField' => '10', 'description' => 'Juvenil C'));
        FieldValue::create(array('idSportField' => '10', 'description' => 'Juvenil superior'));
        
        // Valores de Tiro con Arco - Categoria
        FieldValue::create(array('idSportField' => '11', 'description' => 'Infantil'));
        FieldValue::create(array('idSportField' => '11', 'description' => 'Juvenil menor A'));
        FieldValue::create(array('idSportField' => '11', 'description' => 'Juvenil menor B'));
        FieldValue::create(array('idSportField' => '11', 'description' => 'Juvenil superior'));
        FieldValue::create(array('idSportField' => '11', 'description' => 'Juvenil Mayor'));

        // Valores de Tiro con Arco - Prueba
        FieldValue::create(array('idSportField' => '12', 'description' => 'Recurvo'));
        FieldValue::create(array('idSportField' => '12', 'description' => 'Compuesto'));

        // Valores de Esgrima - Categoria
        FieldValue::create(array('idSportField' => '13', 'description' => 'Infantil'));
        FieldValue::create(array('idSportField' => '13', 'description' => 'Cadete menor'));
        FieldValue::create(array('idSportField' => '13', 'description' => 'Cadete mayor'));
        FieldValue::create(array('idSportField' => '13', 'description' => 'Juvenil Superior'));
        FieldValue::create(array('idSportField' => '13', 'description' => 'Open'));

        // Valores de Esgrima - Prueba
        FieldValue::create(array('idSportField' => '14', 'description' => 'Sable'));
        FieldValue::create(array('idSportField' => '14', 'description' => 'Espada'));
        FieldValue::create(array('idSportField' => '14', 'description' => 'Florete'));

        // Valores de Canotaje - Categoria
        FieldValue::create(array('idSportField' => '15', 'description' => 'Infantil mayor sub 15'));
        FieldValue::create(array('idSportField' => '15', 'description' => 'Infantil mayor sub 17'));
        FieldValue::create(array('idSportField' => '15', 'description' => 'Infantil mayor sub 19'));
        FieldValue::create(array('idSportField' => '15', 'description' => 'Juvenil superior'));

        // Valores de Canotaje - Prueba
        FieldValue::create(array('idSportField' => '16', 'description' => 'Kayak'));
        FieldValue::create(array('idSportField' => '16', 'description' => 'Canoa'));

        // Tiro deportivo - Escolaridad
        FieldValue::create(array('idSportField' => '17', 'description' => 'Primaria'));
        FieldValue::create(array('idSportField' => '17', 'description' => 'Secundaria'));
        FieldValue::create(array('idSportField' => '17', 'description' => 'Preparatoria'));
        FieldValue::create(array('idSportField' => '17', 'description' => 'Universidad'));

        // Tiro deportivo - Categoría
        FieldValue::create(array('idSportField' => '18', 'description' => 'Pre juvenil'));
        FieldValue::create(array('idSportField' => '18', 'description' => 'Juvenil menor'));
        FieldValue::create(array('idSportField' => '18', 'description' => 'Juvenil A'));
        FieldValue::create(array('idSportField' => '18', 'description' => 'Juvenil B'));

        // Tiro deportivo - Prueba
        FieldValue::create(array('idSportField' => '19', 'description' => 'Tiro olímpico rifle match'));
        FieldValue::create(array('idSportField' => '19', 'description' => 'Tiro olímpico pistola'));
        FieldValue::create(array('idSportField' => '19', 'description' => 'Tiro olímpico rifle de quebrar'));

        // Badminton - Escolaridad
        FieldValue::create(array('idSportField' => '20', 'description' => 'Primaria'));
        FieldValue::create(array('idSportField' => '20', 'description' => 'Secundaria'));
        FieldValue::create(array('idSportField' => '20', 'description' => 'Preparatoria'));
        FieldValue::create(array('idSportField' => '20', 'description' => 'Universidad'));

        // Badminton - Categoria
        FieldValue::create(array('idSportField' => '21', 'description' => 'Juvenil menor sub 15'));
        FieldValue::create(array('idSportField' => '21', 'description' => 'Juvenil mayor sub 15'));
        FieldValue::create(array('idSportField' => '21', 'description' => 'Juvenil menor sub 17'));
        FieldValue::create(array('idSportField' => '21', 'description' => 'Juvenil mayor sub 17'));
        FieldValue::create(array('idSportField' => '21', 'description' => 'Juvenil menor sub 19'));
        FieldValue::create(array('idSportField' => '21', 'description' => 'Juvenil mayor sub 19'));

        // Badminton - Competencias
        FieldValue::create(array('idSportField' => '22', 'description' => 'Individual'));
        FieldValue::create(array('idSportField' => '22', 'description' => 'Equipos'));

        // Natacion - Categoria
        FieldValue::create(array('idSportField' => '23', 'description' => 'Infantil B (11-12)'));
        FieldValue::create(array('idSportField' => '23', 'description' => 'Juvenil A (13-14)'));
        FieldValue::create(array('idSportField' => '23', 'description' => 'Juvenil B (15-16)'));
        FieldValue::create(array('idSportField' => '23', 'description' => 'Primera fuerza (17-18)'));

        // Natacion - Estilo principal
        FieldValue::create(array('idSportField' => '24', 'description' => 'Libre (Crawl)'));
        FieldValue::create(array('idSportField' => '24', 'description' => 'Dorso'));
        FieldValue::create(array('idSportField' => '24', 'description' => 'Pecho'));
        FieldValue::create(array('idSportField' => '24', 'description' => 'Mariposa'));

        // Natacion - Tipo de pruebas
        FieldValue::create(array('idSportField' => '25', 'description' => 'Super velocidad'));
        FieldValue::create(array('idSportField' => '25', 'description' => 'Velocidad'));
        FieldValue::create(array('idSportField' => '25', 'description' => 'Medio fondo'));
        FieldValue::create(array('idSportField' => '25', 'description' => 'Fondo'));
        FieldValue::create(array('idSportField' => '25', 'description' => 'Aguas abiertas'));

        // Tae Kwon Do - Modalidades
        FieldValue::create(array('idSportField' => '26', 'description' => 'Formas'));
        FieldValue::create(array('idSportField' => '26', 'description' => 'Combate'));

        // Tae Kwon Do - Categoria
        FieldValue::create(array('idSportField' => '27', 'description' => 'Infantil menor'));
        FieldValue::create(array('idSportField' => '27', 'description' => 'Infantil mayor'));
        FieldValue::create(array('idSportField' => '27', 'description' => 'Juvenil menor'));
        FieldValue::create(array('idSportField' => '27', 'description' => 'Juvenil mayor'));

        // Judo - Categoria
        FieldValue::create(array('idSportField' => '28', 'description' => 'Infantil mayor'));
        FieldValue::create(array('idSportField' => '28', 'description' => 'Juvenil menor'));
        FieldValue::create(array('idSportField' => '28', 'description' => 'Juvenil mayor'));
        FieldValue::create(array('idSportField' => '28', 'description' => 'Juvenil superior'));

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
            'name'          => 'Administrador',
            'firstSurname'  => 'Administrador',
            'secondSurname' => 'Administrador',
            'email'         => 'alvarezhernandez.alfredo@gmail.com',
            'password'      => Hash::make('carteam5'),
            'birthday'      => '2000-1-1',
            'idGender'      => '1',
            'idUserType'    => '2',
            'idLastProfile' => null
        ));
        
        User::create(array
        (
            'name'          => 'Adam Jacob',
            'firstSurname'  => 'Flores',
            'secondSurname' => 'Barba',
            'email'         => 'adamjflores18@gmail.com',
            'password'      => Hash::make('contra.tijuana18'),
            'birthday'      => '1983-10-7',
            'idGender'      => '1',
            'idUserType'    => '2',
            'idLastProfile' => null
        ));
        
        User::create(array
        (
            'name'          => 'Eva Tatiana',
            'firstSurname'  => 'Maldonado',
            'secondSurname' => 'Flores',
            'email'         => 'psic.tatianamaldonado@gmail.com',
            'password'      => Hash::make('taty123'),
            'birthday'      => '1980-5-15',
            'idGender'      => '2',
            'idUserType'    => '2',
            'idLastProfile' => null
        ));
        
        User::create(array
        (
            'name'          => 'Alejandra',
            'firstSurname'  => 'Ávila',
            'secondSurname' => 'Flores',
            'email'         => 'sakurandra@gmail.com',
            'password'      => Hash::make('nicolas.13'),
            'birthday'      => '1986-4-26',
            'idGender'      => '2',
            'idUserType'    => '2',
            'idLastProfile' => null
        ));
    }
}

/******************************************************************************
*
* Módulo de Tests
*
******************************************************************************/

class TestTypesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('testtypes')->delete();

        TestType::create(array
        (
            'description' => 'Ansiedad',
        ));
        
        TestType::create(array
        (
            'description' => '',
        ));
        
        TestType::create(array
        (
            'description' => 'Evaluación Mental',
        ));
    }
}

/******************************************************************************
* --- IPRD ---
******************************************************************************/
class IPRDSeeder extends Seeder
{
    public function run()
    {
        /******************************************************************************
        * --- Test ---
        ******************************************************************************/
        Test::create(array
        (
            'name'       => 'IPRD',
            'idTestType' => '3'
        ));
        
        /******************************************************************************
        * --- Escalas ---
        ******************************************************************************/
        Scale::create(array
        (
            'idTest'      => '1',
            'description' => 'Auto Confianza'
        ));
        
        Scale::create(array
        (
            'idTest'      => '1',
            'description' => 'Control Afrontamiento Negativo'
        ));
        
        Scale::create(array
        (
            'idTest'      => '1',
            'description' => 'Control Atencional'
        ));
        
        Scale::create(array
        (
            'idTest'      => '1',
            'description' => 'Control Visual Imaginativo'
        ));
        
        Scale::create(array
        (
            'idTest'      => '1',
            'description' => 'Nivel Motivación'
        ));
        
        Scale::create(array
        (
            'idTest'      => '1',
            'description' => 'Control Afrontamiento Positivo'
        ));
        
        Scale::create(array
        (
            'idTest'      => '1',
            'description' => 'Control Autoestima'
        ));
        
        /******************************************************************************
        * --- Rangos Posibles ---
        ******************************************************************************/
        Range::create(array
        (
            'description' => 'Bajo',
            'min' => '0.0',
            'max' => '0.0'
        ));
        
        /******************************************************************************
        * --- Rangos por Escala ---
        ******************************************************************************/
        ScaleRange::create(array
        (
            'idScale' => '1',
            'idRange' => '1'
        ));
        
        /******************************************************************************
        * --- Grupos ---
        ******************************************************************************/
        Group::create(array()); // IPRD (orden normal) Con id = 1
        Group::create(array()); // IPRD (orden inverso) Con id = 2
        
        /******************************************************************************
        * --- Posibles Respuestas ---
        ******************************************************************************/ 
        
        // --- IPRD (orden normal) ---
        TestAnswer::create(array
        (
            'number'      => '1',
            'description' => 'Casi nunca',
            'idGroup'     => '1'
        ));
        
        TestAnswer::create(array
        (
            'number'      => '2',
            'description' => 'Pocas veces',
            'idGroup'     => '1'
        ));
        
        TestAnswer::create(array
        (
            'number'      => '3',
            'description' => 'Regularmente',
            'idGroup'     => '1'
        ));
        
        TestAnswer::create(array
        (
            'number'      => '4',
            'description' => 'Muchas veces',
            'idGroup'     => '1'
        ));
        
        TestAnswer::create(array
        (
            'number'      => '5',
            'description' => 'Casi siempre',
            'idGroup'     => '1'
        ));
        
        // --- IPRD (orden inverso) ---
        TestAnswer::create(array
        (
            'number'      => '5',
            'description' => 'Casi nunca',
            'idGroup'     => '2'
        ));
        
        TestAnswer::create(array
        (
            'number'      => '4',
            'description' => 'Pocas veces',
            'idGroup'     => '2'
        ));
        
        TestAnswer::create(array
        (
            'number'      => '3',
            'description' => 'Regularmente',
            'idGroup'     => '2'
        ));
        
        TestAnswer::create(array
        (
            'number'      => '2',
            'description' => 'Muchas veces',
            'idGroup'     => '2'
        ));
        
        TestAnswer::create(array
        (
            'number'      => '1',
            'description' => 'Casi siempre',
            'idGroup'     => '2'
        ));
        
        /******************************************************************************
        * --- Preguntas ---
        ******************************************************************************/
        $iprd = '1';
        
        $autoConfianza                = '1';
		$controlAfrontamientoNegativo = '2';
		$controlAtencional            = '3';
		$controlVisualImaginativo     = '4';	
		$nivelMotivacion              = '5';
		$controlAfrontamientoPositivo = '6';
		$controlAutoestima            = '7';
        
        $grupoNormal  = '2';
        $grupoInverso = '1';
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $autoConfianza,
            'number'      => '1',
            'description' => 'Me veo mas como un perdedor que como un ganador durante las competiciones.',
            'idGroup'     => $grupoNormal
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAfrontamientoNegativo,
            'number'      => '2',
            'description' => 'Me enfado y frustro durante la competición.',
            'idGroup'     => $grupoNormal
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAtencional,
            'number'      => '3',
            'description' => 'Llego a distraerme y perder mi concentración durante la competición.',
            'idGroup'     => $grupoNormal
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlVisualImaginativo,
            'number'      => '4',
            'description' => 'Antes de la competición, me imagino a mi mismo ejecutando mis acciones y rindiendo perfectamente.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $nivelMotivacion,
            'number'      => '5',
            'description' => 'Estoy muy motivado para dar lo mejor de mi en la competición.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAfrontamientoPositivo,
            'number'      => '6',
            'description' => 'Puedo mantener emociones positivas durante la competición.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAutoestima,
            'number'      => '7',
            'description' => 'Durante la competición pienso positivamente.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $autoConfianza,
            'number'      => '8',
            'description' => 'Creo en mi mismo como deportista.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAfrontamientoNegativo,
            'number'      => '9',
            'description' => 'Me pongo nervioso durante la competición.',
            'idGroup'     => $grupoNormal
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAtencional,
            'number'      => '10',
            'description' => 'En los momentos críticos de la competición me da la impresión de que mi cabeza va muy deprisa.',
            'idGroup'     => $grupoNormal
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlVisualImaginativo,
            'number'      => '11',
            'description' => 'Practico mentalmente mis habilidades físicas.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $nivelMotivacion,
            'number'      => '12',
            'description' => 'Trabajo y entreno duro gracias a los objetivos que yo me he fijado como deportista.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAfrontamientoPositivo,
            'number'      => '13',
            'description' => 'Disfruto durante la competición,aunque me encuentre con la presencia de dificultades.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAutoestima,
            'number'      => '14',
            'description' => 'Durante la competición mantengo auto conversaciones de carácter negativo.',
            'idGroup'     => $grupoNormal
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $autoConfianza,
            'number'      => '15',
            'description' => 'Pierdo mi confianza fácilmente.',
            'idGroup'     => $grupoNormal
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAfrontamientoNegativo,
            'number'      => '16',
            'description' => 'Los errores durante la competición me hacen sentir y pensar negativamente.',
            'idGroup'     => $grupoNormal
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAtencional,
            'number'      => '17',
            'description' => 'Puedo controlar rápidamente mis emociones y recuperar la concentración.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlVisualImaginativo,
            'number'      => '18',
            'description' => 'Para mi es fácil pensar fotográficamente (en imágenes) acerca de mi deporte.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $nivelMotivacion,
            'number'      => '19',
            'description' => 'No necesito que me empujen a entrenar duro y competir con intensidad. Yo soy mi mejor elemento de motivación.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAfrontamientoPositivo,
            'number'      => '20',
            'description' => 'Cuando las cosas se vuelven contra mi durante la competición, tiendo a des inflarme emocionalmente.',
            'idGroup'     => $grupoNormal
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAutoestima,
            'number'      => '21',
            'description' => 'Empleo todo mi esfuerzo durante la competición, pase lo que pase.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $autoConfianza,
            'number'      => '22',
            'description' => 'Puedo rendir por encima de mi talento y habilidades.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAfrontamientoNegativo,
            'number'      => '23',
            'description' => 'Durante la competición, siento que mis músculos se tensan y creo que no me van a responder.',
            'idGroup'     => $grupoNormal
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAtencional,
            'number'      => '24',
            'description' => 'Me tomo respiros durante la competición.',
            'idGroup'     => $grupoNormal
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlVisualImaginativo,
            'number'      => '25',
            'description' => 'Antes de la competición, me visualizo superando situaciones difíciles y ejecutando acciones complejas.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $nivelMotivacion,
            'number'      => '26',
            'description' => 'Daría lo que fuera por desarrollar todo mi potencial y alcanzar la cumbre como deportista.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAfrontamientoPositivo,
            'number'      => '27',
            'description' => 'Entreno con una intensidad alta y positiva.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAutoestima,
            'number'      => '28',
            'description' => 'Controlando mi pensamiento soy capaz de transformar estados de humor negativos en positivos.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $autoConfianza,
            'number'      => '29',
            'description' => 'Soy un competidor mentalmente tenaz.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAfrontamientoNegativo,
            'number'      => '30',
            'description' => 'Cuando compito, las situaciones incontrolables, como el viento, las trampas de los contrarios, los malos arbitrajes me alteran y hacen que me derrumbe.',
            'idGroup'     => $grupoNormal
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAtencional,
            'number'      => '31',
            'description' => 'Durante la competición, pienso en errores pasados o en oportunidades perdidas.',
            'idGroup'     => $grupoNormal
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlVisualImaginativo,
            'number'      => '32',
            'description' => 'Durante la competición utilizo imágenes que me ayudan a rendir mejor.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $nivelMotivacion,
            'number'      => '33',
            'description' => 'Estoy aburrido y quemado.',
            'idGroup'     => $grupoNormal
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAfrontamientoPositivo,
            'number'      => '34',
            'description' => 'Las situaciones difíciles para mi suponen un desafío y me inspiran.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAutoestima,
            'number'      => '35',
            'description' => 'Mi entrenador diría de mi que tengo una buena actitud.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $autoConfianza,
            'number'      => '36',
            'description' => 'La imagen que proyecto al exterior es de ser un luchador.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAfrontamientoNegativo,
            'number'      => '37',
            'description' => 'Puedo permanecer tranquilo durante la competición pese a que amanezcan problemas perturbadores.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAtencional,
            'number'      => '38',
            'description' => 'Mi concentración se rompe fácilmente.',
            'idGroup'     => $grupoNormal
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlVisualImaginativo,
            'number'      => '39',
            'description' => 'Cuando me visualizo compitiendo o entrenando, puedo ver y sentir las cosas muy vivamente.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $nivelMotivacion,
            'number'      => '40',
            'description' => 'Al despertar por las mañanas, me siento excitado en relación a los entrenamientos y competiciones.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAfrontamientoPositivo,
            'number'      => '41',
            'description' => 'Practicar este deporte me aporta un sentido genuino de disfrute y realización.',
            'idGroup'     => $grupoInverso
        ));
        
        Question::create(array
        (
            'idTest'      => $iprd,
            'idScale'     => $controlAutoestima,
            'number'      => '42',
            'description' => 'Yo puedo convertir una crisis en una oportunidad.',
            'idGroup'     => $grupoInverso
        ));
    }
}