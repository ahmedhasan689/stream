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
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->string('name',250);
            $table->string('image')->nullable();
            $table->string('trailer')->nullable();
            $table->text('describe')->nullable();
            $table->string('video')->nullable();
            $table->unsignedInteger('episode_number')->default('1');
            $table->unsignedBigInteger('hour')->nullable();
            $table->unsignedBigInteger('minute')->nullable();
            $table->date('release_year');
            $table->string('quality')->nullable();
            $table->unsignedInteger('viewer')->default(0)->nullable();
            $table->double('evaluation')->default(0);
            $table->boolean('status')->default(false);
            $table->foreignId('season_id')->references('id')->on('seasons');
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
        Schema::dropIfExists('episodes');
    }
};
