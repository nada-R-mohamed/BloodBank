<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommunicationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('communication_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('client_id')->unsigned();
			$table->string('title');
			$table->mediumText('content');
			$table->boolean('is_done')->default(0);
            $table->timestamps();

        });
	}

	public function down()
	{
		Schema::drop('communication_requests');
	}
}
