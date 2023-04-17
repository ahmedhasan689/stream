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
        Schema::create('serial_actors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('actor_id')->references('id')->on('actors')->onDelete('cascade');
            $table->foreignId('serial_id')->references('id')->on('serials')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serial_actors');
    }
};
