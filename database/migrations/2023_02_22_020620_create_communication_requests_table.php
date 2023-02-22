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
        Schema::create('communication_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')
                ->constrained('clients','id')
                ->cascadeOnDelete();
            $table->string('title');
            $table->mediumText('content');
            $table->boolean('is_done')->default(0);
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
        Schema::dropIfExists('communication_requests');
    }
};
