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
        Schema::create('donation_requests', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('patient_phone');
            $table->integer('patient_age');
            $table->string('hospital_name');
            $table->text('hospital_address');
            $table->foreignId('city_id')->nullable()
                ->constrained('cities','id')
                ->nullOnDelete();
            $table->foreignId('blood_type_id')->nullable()
                ->constrained('blood_types','id')
                ->nullOnDelete();
            $table->float('bags_num');
            $table->text('details');
            $table->decimal('latitude', 10,8);
            $table->decimal('longitude', 10,8);
            $table->foreignId('client_id')->nullable()
                ->constrained('clients','id')
                ->nullOnDelete();
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
        Schema::dropIfExists('donation_requests');
    }
};
