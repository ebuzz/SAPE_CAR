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
//        // Módulo de Perfiles
//        $this->call('StatesTableSeeder');
//        $this->call('CitiesTableSeeder');
//        $this->call('SportsTableSeeder');
//        $this->call('SportsCitiesTableSeeder');
//        $this->call('RolesTableSeeder');
//        $this->call('SportsFieldsTableSeeder');
//        $this->call('FieldValuesTableSeeder');
//        $this->call('FieldChildValuesTableSeeder');
//
//        // Módulo de Usuarios
//        $this->call('GendersTableSeeder');
//        $this->call('UserTypesTableSeeder');
//        $this->call('UsersTableSeeder');
//
//        // Módulo de Tests
//        $this->call('TestTypesTableSeeder');
//        $this->call('IPRDSeeder');
        $this->call('IPRDRangesSeeder');
        $this->call("SCATSeeder");
        $this->call("CSAI12Seeder");
        $this->call("BURNOUTSeeder");
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
            'description' => 'Necesita de su atención especial',
            'min' => '6.0',
            'max' => '19.0'
        ));

        Range::create(array
        (
            'description' => 'Tiempo para mejorar',
            'min' => '20.0',
            'max' => '25.0'
        ));

        Range::create(array
        (
            'description' => 'Habilidades excelentes',
            'min' => '26.0',
            'max' => '30.0'
        ));
        
        /******************************************************************************
        * --- Rangos por Escala ---
        ******************************************************************************/
        // Auto Confianza
        ScaleRange::create(array
        (
            'idScale' => '1',
            'idRange' => '1'
        ));

        ScaleRange::create(array
        (
            'idScale' => '1',
            'idRange' => '2'
        ));

        ScaleRange::create(array
        (
            'idScale' => '1',
            'idRange' => '3'
        ));
        
        // Control Afrontamiento Negativo
        ScaleRange::create(array
        (
            'idScale' => '2',
            'idRange' => '1'
        ));

        ScaleRange::create(array
        (
            'idScale' => '2',
            'idRange' => '2'
        ));

        ScaleRange::create(array
        (
            'idScale' => '2',
            'idRange' => '3'
        ));
        
        // Control Atencional
        ScaleRange::create(array
        (
            'idScale' => '3',
            'idRange' => '1'
        ));

        ScaleRange::create(array
        (
            'idScale' => '3',
            'idRange' => '2'
        ));

        ScaleRange::create(array
        (
            'idScale' => '3',
            'idRange' => '3'
        ));
        
        // Control Visual Imaginativo
        ScaleRange::create(array
        (
            'idScale' => '4',
            'idRange' => '1'
        ));

        ScaleRange::create(array
        (
            'idScale' => '4',
            'idRange' => '2'
        ));

        ScaleRange::create(array
        (
            'idScale' => '4',
            'idRange' => '3'
        ));
        
        // Nivel Motivación
        ScaleRange::create(array
        (
            'idScale' => '5',
            'idRange' => '1'
        ));

        ScaleRange::create(array
        (
            'idScale' => '5',
            'idRange' => '2'
        ));

        ScaleRange::create(array
        (
            'idScale' => '5',
            'idRange' => '3'
        ));
        
        // Control Afrontamiento Positivo
        ScaleRange::create(array
        (
            'idScale' => '6',
            'idRange' => '1'
        ));

        ScaleRange::create(array
        (
            'idScale' => '6',
            'idRange' => '2'
        ));

        ScaleRange::create(array
        (
            'idScale' => '6',
            'idRange' => '3'
        ));
        
        // Control Autoestima
        ScaleRange::create(array
        (
            'idScale' => '7',
            'idRange' => '1'
        ));

        ScaleRange::create(array
        (
            'idScale' => '7',
            'idRange' => '2'
        ));

        ScaleRange::create(array
        (
            'idScale' => '7',
            'idRange' => '3'
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

class IPRDRangesSeeder extends Seeder
{
    public function run()
    {
        /******************************************************************************
        * --- Rangos Posibles ---
        ******************************************************************************/
        
        $range = Range::find(1);
        $range->description = 'Necesita de su atención especial';
        $range->min = '6.0';
        $range->max = '19.0';
        $range->save();

        Range::create(array
        (
            'description' => 'Tiempo para mejorar',
            'min' => '20.0',
            'max' => '25.0'
        ));

        Range::create(array
        (
            'description' => 'Habilidades excelentes',
            'min' => '26.0',
            'max' => '30.0'
        ));
        
        /******************************************************************************
        * --- Rangos por Escala ---
        ******************************************************************************/
        
        // Nota: Omitimos el (1, 1) por que ya se encuentra registrado en la BD a la fecha
        // de creación de este Seeder

        // Auto Confianza
        ScaleRange::create(array
        (
            'idScale' => '1',
            'idRange' => '2'
        ));

        ScaleRange::create(array
        (
            'idScale' => '1',
            'idRange' => '3'
        ));
        
        // Control Afrontamiento Negativo
        ScaleRange::create(array
        (
            'idScale' => '2',
            'idRange' => '1'
        ));

        ScaleRange::create(array
        (
            'idScale' => '2',
            'idRange' => '2'
        ));

        ScaleRange::create(array
        (
            'idScale' => '2',
            'idRange' => '3'
        ));
        
        // Control Atencional
        ScaleRange::create(array
        (
            'idScale' => '3',
            'idRange' => '1'
        ));

        ScaleRange::create(array
        (
            'idScale' => '3',
            'idRange' => '2'
        ));

        ScaleRange::create(array
        (
            'idScale' => '3',
            'idRange' => '3'
        ));
        
        // Control Visual Imaginativo
        ScaleRange::create(array
        (
            'idScale' => '4',
            'idRange' => '1'
        ));

        ScaleRange::create(array
        (
            'idScale' => '4',
            'idRange' => '2'
        ));

        ScaleRange::create(array
        (
            'idScale' => '4',
            'idRange' => '3'
        ));
        
        // Nivel Motivación
        ScaleRange::create(array
        (
            'idScale' => '5',
            'idRange' => '1'
        ));

        ScaleRange::create(array
        (
            'idScale' => '5',
            'idRange' => '2'
        ));

        ScaleRange::create(array
        (
            'idScale' => '5',
            'idRange' => '3'
        ));
        
        // Control Afrontamiento Positivo
        ScaleRange::create(array
        (
            'idScale' => '6',
            'idRange' => '1'
        ));

        ScaleRange::create(array
        (
            'idScale' => '6',
            'idRange' => '2'
        ));

        ScaleRange::create(array
        (
            'idScale' => '6',
            'idRange' => '3'
        ));
        
        // Control Autoestima
        ScaleRange::create(array
        (
            'idScale' => '7',
            'idRange' => '1'
        ));

        ScaleRange::create(array
        (
            'idScale' => '7',
            'idRange' => '2'
        ));

        ScaleRange::create(array
        (
            'idScale' => '7',
            'idRange' => '3'
        ));
    }
}

/******************************************************************************
* --- SCAT ---
******************************************************************************/
class SCATSeeder extends Seeder
{
    public function run()
    {
        /******************************************************************************
        * --- Test ---
        ******************************************************************************/
        Test::create(array
        (
            'name'       => 'SCAT',
            'idTestType' => '1'
        ));
        /******************************************************************************
        * --- Escalas ---
        ******************************************************************************/
        Scale::create(array
        (
            'idTest'      => '2',
            'description' => 'Puntaje Total '
        ));
        /******************************************************************************
        * --- Rangos Posibles ---
        ******************************************************************************/
        Range::create(array
        (
            'description' => 'Nivel de Ansiedad Bajo',
            'min' => '0.0',
            'max' => '15.0'
        ));

        Range::create(array
        (
            'description' => 'Nivel de Ansiedad Medio',
            'min' => '16.0',
            'max' => '20.0'
        ));

        Range::create(array
        (
            'description' => 'Nivel de Ansiedad Alto',
            'min' => '21.0',
            'max' => '30.0'
        ));
        /******************************************************************************
        * --- Rangos por Escala ---
        ******************************************************************************/
        ScaleRange::create(array
        (
            'idScale' => '8',
            'idRange' => '4'
        ));

        ScaleRange::create(array
        (
            'idScale' => '8',
            'idRange' => '5'
        ));

        ScaleRange::create(array
        (
            'idScale' => '8',
            'idRange' => '6'
        ));

        /******************************************************************************
        * --- Grupos ---
        ******************************************************************************/
        Group::create(array()); // SCAT (orden normal) Con id = 3

        /******************************************************************************
        * --- Posibles Respuestas ---
        ******************************************************************************/ 
        // --- SCAT ---
        TestAnswer::create(array
        (
            'number'      => '0',
            'description' => 'Rara vez',
            'idGroup'     => '3'
        ));

        TestAnswer::create(array
        (
            'number'      => '1',
            'description' => 'A veces',
            'idGroup'     => '3'
        ));

        TestAnswer::create(array
        (
            'number'      => '2',
            'description' => 'A menudo',
            'idGroup'     => '3'
        ));

        /******************************************************************************
        * --- Preguntas ---
        ******************************************************************************/
        $scat = '2';

        $total = '8';
        
        $grupoNormal  = '3';

        Question::create(array
        (
            'idTest'      => $scat,
            'idScale'     => $total,
            'number'      => '1',
            'description' => 'Compitiendo contra otras personas o equipos es socialmente agradable.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $scat,
            'idScale'     => $total,
            'number'      => '2',
            'description' => 'Antes de competir me siento incómodo.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $scat,
            'idScale'     => $total,
            'number'      => '3',
            'description' => 'Antes de competir, me preocupa que no me desempeñe bien.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $scat,
            'idScale'     => $total,
            'number'      => '4',
            'description' => 'Yo soy un buen deportista cuando compito.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $scat,
            'idScale'     => $total,
            'number'      => '5',
            'description' => 'Cuando compito, me preocupa cometer errores.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $scat,
            'idScale'     => $total,
            'number'      => '6',
            'description' => 'Antes de competir, estoy tranquilo.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $scat,
            'idScale'     => $total,
            'number'      => '7',
            'description' => 'Establecer un objetivo es importante a la hora de competir.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $scat,
            'idScale'     => $total,
            'number'      => '8',
            'description' => 'Antes de competir, tengo la sensación de náuseas en el estómago.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $scat,
            'idScale'     => $total,
            'number'      => '9',
            'description' => 'Justo antes de la competencia, siento que mi corazón late más rápido de lo habitual.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $scat,
            'idScale'     => $total,
            'number'      => '10',
            'description' => 'Me gusta competir cuando existe una gran cantidad de energía física.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $scat,
            'idScale'     => $total,
            'number'      => '11',
            'description' => 'Antes de competir, me siento relajado.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $scat,
            'idScale'     => $total,
            'number'      => '12',
            'description' => 'Antes de competir,estoy nervioso.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $scat,
            'idScale'     => $total,
            'number'      => '13',
            'description' => 'Los deportes de equipo son más excitantes que los deportes individuales.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $scat,
            'idScale'     => $total,
            'number'      => '14',
            'description' => 'Me pongo nervioso al iniciar la competencia.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $scat,
            'idScale'     => $total,
            'number'      => '15',
            'description' => 'Antes de competir, normalmente me tenso.',
            'idGroup'     => $grupoNormal
        ));
    }
}

/******************************************************************************
* --- CSAI-12 ---
******************************************************************************/
class CSAI12Seeder extends Seeder
{
    public function run()
    {
        /******************************************************************************
        * --- Test ---
        ******************************************************************************/
        Test::create(array
        (
            'name'       => 'CSAI-12',
            'idTestType' => '1'
        ));

        /******************************************************************************
        * --- Escalas ---
        ******************************************************************************/
        Scale::create(array
        (
            'idTest'      => '3',
            'description' => 'Ansiedad Cognitiva'
        ));

        Scale::create(array
        (
            'idTest'      => '3',
            'description' => 'Ansiedad Somática'
        ));

        Scale::create(array
        (
            'idTest'      => '3',
            'description' => 'Autoconfianza'
        ));

        /******************************************************************************
        * --- Rangos Posibles ---
        ******************************************************************************/
        Range::create(array
        (
            'description' => 'Nivel de Ansiedad Bajo',
            'min' => '0.0',
            'max' => '18.0'
        ));

        Range::create(array
        (
            'description' => 'Nivel de Ansiedad Medio',
            'min' => '19.0',
            'max' => '32.0'
        ));

        Range::create(array
        (
            'description' => 'Nivel de Ansiedad Alto',
            'min' => '33.0',
            'max' => '45.0'
        ));

        /******************************************************************************
        * --- Rangos por Escala ---
        ******************************************************************************/
        // Ansiedad Cognitiva
        ScaleRange::create(array
        (
            'idScale' => '9',
            'idRange' => '7'
        ));

        ScaleRange::create(array
        (
            'idScale' => '9',
            'idRange' => '8'
        ));

        ScaleRange::create(array
        (
            'idScale' => '9',
            'idRange' => '9'
        ));
        // Ansiedad Somatica
        ScaleRange::create(array
        (
            'idScale' => '10',
            'idRange' => '7'
        ));

        ScaleRange::create(array
        (
            'idScale' => '10',
            'idRange' => '8'
        ));

        ScaleRange::create(array
        (
            'idScale' => '10',
            'idRange' => '9'
        ));
        // Autoconfianza
        ScaleRange::create(array
        (
            'idScale' => '11',
            'idRange' => '7'
        ));

        ScaleRange::create(array
        (
            'idScale' => '11',
            'idRange' => '8'
        ));

        ScaleRange::create(array
        (
            'idScale' => '11',
            'idRange' => '9'
        ));
        /******************************************************************************
        * --- Grupos ---
        ******************************************************************************/
        Group::create(array()); // CSAI-2 (orden normal) Con id = 4

        /******************************************************************************
        * --- Posibles Respuestas ---
        ******************************************************************************/ 
         // --- CSAI-12 (orden normal) ---
        TestAnswer::create(array
        (
            'number'      => '1',
            'description' => 'Nunca',
            'idGroup'     => '4'
        ));

        TestAnswer::create(array
        (
            'number'      => '2',
            'description' => 'Casi nunca',
            'idGroup'     => '4'
        ));

        TestAnswer::create(array
        (
            'number'      => '3',
            'description' => 'A veces',
            'idGroup'     => '4'
        ));

        TestAnswer::create(array
        (
            'number'      => '4',
            'description' => 'Casi siempre',
            'idGroup'     => '4'
        ));

        TestAnswer::create(array
        (
            'number'      => '5',
            'description' => 'Siempre',
            'idGroup'     => '4'
        ));

        /******************************************************************************
        * --- Preguntas ---
        ******************************************************************************/
        $csai_12 = '3';

        // CSAI-12
        $ansiedadCognitiva = '9';
        $ansiedadSomatica  = '10';
        $autoConfianza_CS  = '11';

        $grupoNormal  = '4';

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $ansiedadCognitiva,
            'number'      => '1',
            'description' => 'Estoy concentrado en la competición.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $ansiedadSomatica,
            'number'      => '2',
            'description' => 'Estoy inquieto.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $autoConfianza_CS,
            'number'      => '3',
            'description' => 'Me encuentro a gusto.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $ansiedadCognitiva,
            'number'      => '4',
            'description' => 'Dudo de mis capacidades.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $ansiedadSomatica,
            'number'      => '5',
            'description' => 'Estoy nervioso.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $autoConfianza_CS,
            'number'      => '6',
            'description' => 'Me encuentro cómodo.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $ansiedadCognitiva,
            'number'      => '7',
            'description' => 'Me preocupa que no pueda hacerlo tan bien como podría.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $ansiedadSomatica,
            'number'      => '8',
            'description' => 'Mi cuerpo está tenso.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $autoConfianza_CS,
            'number'      => '9',
            'description' => 'Confío en mí.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $ansiedadCognitiva,
            'number'      => '10',
            'description' => 'Soy consciente de la posibilidad de perder.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $ansiedadSomatica,
            'number'      => '11',
            'description' => 'Antes de competir siento molestias en el estomago.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $autoConfianza_CS,
            'number'      => '12',
            'description' => 'Me siento seguro.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $ansiedadCognitiva,
            'number'      => '13',
            'description' => 'Soy consciente de las situaciones de presion.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $ansiedadSomatica,
            'number'      => '14',
            'description' => 'Mi cuerpo está relajado.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $autoConfianza_CS,
            'number'      => '15',
            'description' => 'Tengo confianza en mi mismo.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $ansiedadCognitiva,
            'number'      => '16',
            'description' => 'Confio en mi buena preparación física.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $ansiedadSomatica,
            'number'      => '17',
            'description' => 'Antes de competir mi corazón late más rápido de lo habitual.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $autoConfianza_CS,
            'number'      => '18',
            'description' => 'Confio en mi rendimiento.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $ansiedadCognitiva,
            'number'      => '19',
            'description' => 'Me preocupo por alcanzar mi meta.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $ansiedadSomatica,
            'number'      => '20',
            'description' => 'Tengo el estómago revuelto.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $autoConfianza_CS,
            'number'      => '21',
            'description' => 'Estoy mentalmente relajado.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $ansiedadCognitiva,
            'number'      => '22',
            'description' => 'Me preocupa que los demás queden desilusionados con mi rendimiento.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $ansiedadSomatica,
            'number'      => '23',
            'description' => 'Me sudan las manos.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $autoConfianza_CS,
            'number'      => '24',
            'description' => 'Estoy confiado porque me veo alcanzando más metas.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $ansiedadCognitiva,
            'number'      => '25',
            'description' => 'Me preocupa no sentirme capacitado para concentrarme.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $ansiedadSomatica,
            'number'      => '26',
            'description' => 'Mi cuerpo está rígido.',
            'idGroup'     => $grupoNormal
        ));

        Question::create(array
        (
            'idTest'      => $csai_12,
            'idScale'     => $autoConfianza_CS,
            'number'      => '27',
            'description' => 'Confío lograrlo todo aún bajo presión.',
            'idGroup'     => $grupoNormal
        ));
    }

}

/******************************************************************************
* --- BURNOUT ---
******************************************************************************/

class BURNOUTSeeder extends Seeder
{
    public function run()
    {
        /******************************************************************************
        * --- Test ---
        ******************************************************************************/
        Test::create(array
        (
            'name'       => 'BURNOUT',
            'idTestType' => '2'
        ));

        /******************************************************************************
        * --- Escalas ---
        ******************************************************************************/
        Scale::create(array
        (
            'idTest'      => '4',
            'description' => 'Reducida Sensación'
        ));

        Scale::create(array
        (
            'idTest'      => '4',
            'description' => 'Agotamiento'
        ));

        Scale::create(array
        (
            'idTest'      => '4',
            'description' => 'Devaluación'
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

        Range::create(array
        (
            'description' => 'Medio',
            'min' => '0.0',
            'max' => '0.0'
        ));

        Range::create(array
        (
            'description' => 'Alto',
            'min' => '0.0',
            'max' => '0.0'
        ));
        
        /******************************************************************************
        * --- Rangos por Escala ---
        ******************************************************************************/
        
        // Reducida Sensación
        ScaleRange::create(array
        (
            'idScale' => '12',
            'idRange' => '10'
        ));

        ScaleRange::create(array
        (
            'idScale' => '12',
            'idRange' => '11'
        ));
        
        ScaleRange::create(array
        (
            'idScale' => '12',
            'idRange' => '12'
        ));
        
        // Agotamiento
        ScaleRange::create(array
        (
            'idScale' => '13',
            'idRange' => '10'
        ));

        ScaleRange::create(array
        (
            'idScale' => '13',
            'idRange' => '11'
        ));
        
        ScaleRange::create(array
        (
            'idScale' => '13',
            'idRange' => '12'
        ));
        
        // Devaluación
        ScaleRange::create(array
        (
            'idScale' => '14',
            'idRange' => '10'
        ));

        ScaleRange::create(array
        (
            'idScale' => '14',
            'idRange' => '11'
        ));
        
        ScaleRange::create(array
        (
            'idScale' => '14',
            'idRange' => '12'
        ));
        
        /******************************************************************************
        * --- Grupos ---
        ******************************************************************************/
        Group::create(array()); // Burnout (orden normal) Con id = 5
        Group::create(array()); // Burnout (orden inverso) Con id = 6

        /******************************************************************************
        * --- Posibles Respuestas ---
        ******************************************************************************/ 
         // --- BURNOUT (orden normal) ---
        TestAnswer::create(array
        (
            'number'      => '1',
            'description' => 'Casi nunca',
            'idGroup'     => '5'
        ));
        
        TestAnswer::create(array
        (
            'number'      => '2',
            'description' => 'Pocas veces',
            'idGroup'     => '5'

        ));
        
        TestAnswer::create(array
        (
            'number'      => '3',
            'description' => 'Algunas veces',
            'idGroup'     => '5'
        ));
        
        TestAnswer::create(array
        (
            'number'      => '4',
            'description' => 'A menudo',
            'idGroup'     => '5'
        ));
        
        TestAnswer::create(array
        (
            'number'      => '5',
            'description' => 'Casi siempre',
            'idGroup'     => '5'
        ));

         // --- BURNOUT (orden inverso) ---

         TestAnswer::create(array
        (
            'number'      => '5',
            'description' => 'Casi nunca',
            'idGroup'     => '6'
        ));
        
        TestAnswer::create(array
        (
            'number'      => '4',
            'description' => 'Pocas veces',
            'idGroup'     => '6'

        ));
        
        TestAnswer::create(array
        (
            'number'      => '3',
            'description' => 'Algunas veces',
            'idGroup'     => '6'
        ));
        
        TestAnswer::create(array
        (
            'number'      => '2',
            'description' => 'A menudo',
            'idGroup'     => '6'
        ));
        
        TestAnswer::create(array
        (
            'number'      => '1',
            'description' => 'Casi siempre',
            'idGroup'     => '6'
        ));

        /******************************************************************************
        * --- Preguntas ---
        ******************************************************************************/
        $burnout = '4';
        
        $reducidaSensacion      = '12';
        $agotamiento            = '13';
        $devaluacion            = '14';

        $grupoBurnoutNormal = '5';
        $grupoBurnoutInverso = '6';

        Question::create(array
        (
            'idTest'      => $burnout,
            'idScale'     => $reducidaSensacion,
            'number'      => '1',
            'description' => 'Siento que estoy logrando muchas cosas que valen la pena en mi deporte.',
            'idGroup'     => $grupoBurnoutInverso
        ));

        Question::create(array
        (
            'idTest'      => $burnout,
            'idScale'     => $agotamiento,
            'number'      => '2',
            'description' => 'Me siento tan cansado de mis entrenamientos que tengo problemas al encontrar energía para hacer otras cosas.',
            'idGroup'     => $grupoBurnoutNormal
        ));

        Question::create(array
        (
            'idTest'      => $burnout,
            'idScale'     => $devaluacion,
            'number'      => '3',
            'description' => 'El esfuerzo y tiempo que dedico a mi deporte estaría mejor invertido realizando otras actividades más productivas.',
            'idGroup'     => $grupoBurnoutNormal
        ));

        Question::create(array
        (
            'idTest'      => $burnout,
            'idScale'     => $agotamiento,
            'number'      => '4',
            'description' => 'Me siento demasiado cansado debido a mis actividades en mi deporte.',
            'idGroup'     => $grupoBurnoutNormal
        ));

        Question::create(array
        (
            'idTest'      => $burnout,
            'idScale'     => $reducidaSensacion,
            'number'      => '5',
            'description' => 'No estoy consiguiendo logros importantes en mi deporte.',
            'idGroup'     => $grupoBurnoutNormal
        ));

        Question::create(array
        (
            'idTest'      => $burnout,
            'idScale'     => $devaluacion,
            'number'      => '6',
            'description' => 'No me importa tanto mi rendimiento en mi deporte como antes.',
            'idGroup'     => $grupoBurnoutNormal
        ));

        Question::create(array
        (
            'idTest'      => $burnout,
            'idScale'     => $reducidaSensacion,
            'number'      => '7',
            'description' => 'No estoy rindiendo de acuerdo a mi verdadera capacidad en mi deporte.',
            'idGroup'     => $grupoBurnoutNormal
        ));

        Question::create(array
        (
            'idTest'      => $burnout,
            'idScale'     => $agotamiento,
            'number'      => '8',
            'description' => 'Me siento "desgastado" física y emocionalmente por debido a mi deporte.',
            'idGroup'     => $grupoBurnoutNormal
        ));

        Question::create(array
        (
            'idTest'      => $burnout,
            'idScale'     => $devaluacion,
            'number'      => '9',
            'description' => 'No estoy tan interesado en mi deporte como acostumbraba hacerlo antes.',
            'idGroup'     => $grupoBurnoutNormal
        ));

        Question::create(array
        (
            'idTest'      => $burnout,
            'idScale'     => $agotamiento,
            'number'      => '10',
            'description' => 'Me siento físicamente agotado por debido a mi deporte.',
            'idGroup'     => $grupoBurnoutNormal
        ));

        Question::create(array
        (
            'idTest'      => $burnout,
            'idScale'     => $devaluacion,
            'number'      => '11',
            'description' => 'Me siento menos preocupado por tener éxito en mi deporte de lo que solía hacerlo.',
            'idGroup'     => $grupoBurnoutNormal
        ));

        Question::create(array
        (
            'idTest'      => $burnout,
            'idScale'     => $agotamiento,
            'number'      => '12',
            'description' => 'Estoy agotado por las exigencias físicas y mentales de mi deporte.',
            'idGroup'     => $grupoBurnoutNormal
        ));

        Question::create(array
        (
            'idTest'      => $burnout,
            'idScale'     => $reducidaSensacion,
            'number'      => '13',
            'description' => 'Parece que no importa lo que haga, no logro rendir tan bien como podría hacerlo.',
            'idGroup'     => $grupoBurnoutNormal
        ));

        Question::create(array
        (
            'idTest'      => $burnout,
            'idScale'     => $reducidaSensacion,
            'number'      => '14',
            'description' => 'Me siento exitoso en mi deporte.',
            'idGroup'     => $grupoBurnoutInverso
        ));

        Question::create(array
        (
            'idTest'      => $burnout,
            'idScale'     => $devaluacion,
            'number'      => '15',
            'description' => 'Tengo sentimientos y pensamientos negativos hacia mi deporte.',
            'idGroup'     => $grupoBurnoutNormal
        ));
    }
}