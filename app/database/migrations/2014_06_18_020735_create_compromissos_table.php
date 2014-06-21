<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompromissosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('compromissos', function(Blueprint $table) {
			$table->increments('id');
			$table->datetime('data_fim')->nullable();
			$table->datetime('data_ini');
			$table->text('descricao');
			$table->string('titulo');
			$table->integer('user_id');
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
		Schema::drop('compromissos');
	}

}
