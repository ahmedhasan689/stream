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
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->string('name',250);
            $table->string('image')->nullable();
            $table->text('describe');
            $table->string('trailer')->nullable();
            $table->double('evaluation')->default(0);
            $table->unsignedInteger('number')->default(1);
            $table->boolean('status')->default(false);
            $table->date('release_year');
            $table->unsignedInteger('viewer')->default(0)->nullable();
            $table->foreignId('serial_id')->references('id')->on('serials');
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
        Schema::dropIfExists('seasons');
    }
};
