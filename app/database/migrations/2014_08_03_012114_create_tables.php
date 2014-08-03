<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration 
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        /**********************************************************************
        *
        * Módulo de Perfiles
        *
        **********************************************************************/
        Schema::create('States',function($table)
		{
			$table->increments('idState');
			$table->string('description',20);

		});

		Schema::create('Cities',function($table)
		{
			$table->increments('idCity');
			$table->string('description',30);
			$table->integer('idState')->unsigned();

			$table->foreign('idState')
			->references('idState')->on('States');

		});

		Schema::create('Sports',function($table)
		{
			$table->increments('idSport');
			$table->string('description',30);

		});

		Schema::create('SportsCities',function($table)
		{
			$table->integer('idSport')->unsigned();
			$table->integer('idCity')->unsigned();

			$table->foreign('idCity')
			->references('idCity')->on('Cities');
			$table->foreign('idSport')
			->references('idSport')->on('Sports');
		});

		Schema::create('SportFields', function($table)
        {
			$table->increments('idSportField');
			$table->string('name',30);
			$table->integer('idSport')->unsigned();

			$table->foreign('idSport')
			->references('idSport')->on('Sports');
		});

		Schema::create('FieldValues', function($table){
			$table->increments('idFieldValue');
			$table->string('description',30);
			$table->integer('idSportField')->unsigned();

			$table->foreign('idSportField')
			->references('idSportField')->on('SportFields');

		});

		Schema::create('FieldChildValues', function($table)
        {
			$table->integer('idChildField')->unsigned();
			$table->integer('idParentField')->unsigned();

			$table->foreign('idChildField')
			->references('idFieldValue')->on('FieldValues');
			$table->foreign('idParentField')
			->references('idFieldValue')->on('FieldValues');
		});
        
        Schema::create('Roles', function($table)
        {
			$table->increments('idRole');
			$table->string('description',30);
		});

		Schema::create('Profiles', function($table)
        {
			$table->increments('idProfile');
			$table->integer('idSport')->unsigned();
			$table->integer('idRole')->unsigned();
			$table->timestamps();

			$table->foreign('idSport')
			->references('idSport')->on('Sports');
			$table->foreign('idRole')
			->references('idRole')->on('Roles');
		});

		Schema::create('ProfileValues', function($table)
        {
			$table->increments('idProfile');
			$table->integer('idFieldValue')->unsigned();
			$table->integer('idSportField')->unsigned();

			$table->foreign('idFieldValue')
			->references('idFieldValue')->on('FieldValues');
			$table->foreign('idSportField')
			->references('idSportField')->on('SportFields');
			
		});
        
        /**********************************************************************
        *
        * Módulo de Usuarios
        *
        **********************************************************************/
        Schema::create('Genders', function($table)
        {
            $table->increments('idGender');
            $table->string('description', 20);
        });
        
        Schema::create('UserTypes', function($table)
        {
            $table->increments('idUserType');
            $table->string('description', 20);
        });
        
        Schema::create('Users', function($table)
        {
            $table->increments('idUser');
            $table->string('name', 30);
            $table->string('firstSurname', 30);
            $table->string('secondSurname', 30);
            $table->string('email', 30);
            $table->string('password', 60);
            $table->date('birthday');
            $table->integer('idGender')->unsigned();
            $table->integer('idUserType')->unsigned();
            $table->integer('idLastProfile')->unsigned();
            
            $table->rememberToken();
            $table->timestamps();
            
            // LLaves foráneas
            $table->foreign('idGender')->references('idGender')->on('Genders');
            $table->foreign('idUserType')->references('idUserType')->on('UserTypes');
            $table->foreign('idLastProfile')->references('idProfile')->on('Profiles');
            
            $table->unique('email');
        });
        
        /**********************************************************************
        *
        * Módulo de Tests
        *
        **********************************************************************/
        Schema::create('TestTypes', function($table)
        {
            //Fields
            $table->increments('idTestType');
            $table->string('description', 30);
        });

        Schema::create('Tests', function($table)
        {
            //Fields
            $table->increments('idTest');
            $table->string('name', 20);
            $table->integer('idTestType')->unsigned();

            //Foreign Key Constraints
            $table->foreign('idTestType')->references('idTestType')->on('TestTypes');
        });

        Schema::create('UsersAnsweredTests', function($table)
        {
            //Fields
            $table->increments('idUserAnsweredTest');
            $table->integer('idUser')->unsigned();
            $table->integer('idTest')->unsigned();
            $table->integer('idProfileAtMoment')->unsigned();

            //Foreign Key Constraints
            $table->foreign('idUser')->references('idUser')->on('Users');
            $table->foreign('idTest')->references('idTest')->on('Tests');
            $table->foreign('idProfileAtMoment')->references('idProfile')->on('Profiles');
        });

        Schema::create('Ranges', function($table)
        {
            //Fields
            $table->increments('idRange');
            $table->string('description', 45);
            $table->float('min');
            $table->float('max');
        });

        Schema::create('Groups', function($table)
        {
            //Fields
            $table->increments('idGroup');
        });

        Schema::create('Scales', function($table)
        {
            //Fields
            $table->increments('idScale');
            $table->integer('idRange')->unsigned();
            $table->integer('idTest')->unsigned();
            $table->string('description', 40);

            //Foreign Key Constraints
            $table->foreign('idRange')->references('idRange')->on('Ranges');
            $table->foreign('idTest')->references('idTest')->on('Tests');
        });

        Schema::create('Questions', function($table)
        {
            //Fields
            $table->increments('idQuestion');
            $table->integer('idTest')->unsigned();
            $table->integer('idScale')->unsigned();
            $table->integer('number');
            $table->string('description', 250);
            $table->integer('idGroup')->unsigned();

            //Foreign Key Constraints
            $table->foreign('idTest')->references('idTest')->on('Tests');
            $table->foreign('idScale')->references('idScale')->on('Scales');
            $table->foreign('idGroup')->references('idGroup')->on('Groups');
        });
        
        Schema::create('TestAnswers', function($table)
        {
            //Fields
            $table->increments('idTestAnswer');
            $table->integer('number');
            $table->string('description', 30);
            $table->integer('idGroup')->unsigned();

            //Foreign Key Constraints
            $table->foreign('idGroup')->references('idGroup')->on('Groups');
        });

        Schema::create('UsersAnswers', function($table)
        {
            //Fields
            $table->integer('idTestAnswer')->unsigned();
            $table->integer('idQuestion')->unsigned();
            $table->integer('idUserAnsweredTest')->unsigned();

            //Foreign Key Constraints
            $table->foreign('idTestAnswer')->references('idTestAnswer')->on('TestAnswers');
            $table->foreign('idQuestion')->references('idQuestion')->on('Questions');
            $table->foreign('idUserAnsweredTest')->references('idUserAnsweredTest')->on('UsersAnsweredTests');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	}
}
