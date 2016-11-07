<?php

usIlluminate\Database\Schema\Blueprint;
ue se Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombres', 80);
			$table->string('apellidos', 80);
			$table->bigInt('id_user_ryca', 20);
			$table->string('profile_ryca', 45);
			$table->tinyInt('es_superadmin', 1);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuarios');
	}

}
