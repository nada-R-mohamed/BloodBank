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
        Schema::create('blood_type_client', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blood_type_id')
                ->constrained('blood_types','id')
                ->cascadeOnDelete();
            $table->foreignId('client_id')
                ->constrained('clients','id')
                ->cascadeOnDelete();
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
        Schema::dropIfExists('blood_type_clients');
    }
};
