<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->date('date_of_birth');
            $table->foreignId('blood_type_id')->nullable()
                ->constrained('blood_types','id')
                ->nullOnDelete();
            $table->date('last_donation_date');
            $table->foreignId('city_id')->nullable()
                ->constrained('cities','id')
                ->nullOnDelete();
            $table->integer('pin_code');
            $table->string('device_name',60);
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
        Schema::dropIfExists('clients');
    }
};
