<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->text('notification_setting_text');
			$table->longText('about_app');
			$table->string('phone');
			$table->string('email');
			$table->text('facebook_url');
			$table->text('twitter_url');
			$table->text('instagram_url');
			$table->text('youtube_url');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('settings');
	}
}
