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
        Schema::create('client_governorate', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')
                ->constrained('clients','id')
                ->cascadeOnDelete();
            $table->foreignId('governorate_id')
                ->constrained('governorates','id')
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
        Schema::dropIfExists('client_governorates');
    }
};
