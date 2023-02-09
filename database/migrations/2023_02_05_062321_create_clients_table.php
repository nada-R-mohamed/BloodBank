<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('phone')->unique();
			$table->string('password');
			$table->string('email')->unique();
			$table->date('date_of_birth');
			$table->integer('blood_type');
			$table->date('last_donation_date');
			$table->integer('city_id');
			$table->integer('pin_code');
            $table->string('device_name',60);
            $table->string('remember_token',100)->nullable();
            $table->timestamps();

        });
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
