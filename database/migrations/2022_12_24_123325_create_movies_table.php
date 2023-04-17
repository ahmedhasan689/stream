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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name',250);
            $table->text('describe');
            $table->unsignedBigInteger('hour')->nullable();
            $table->unsignedBigInteger('minute')->nullable();
            $table->string('image')->nullable();
            $table->date('release_year');
            $table->string('quality');
            $table->string('video')->nullable();
            $table->double('evaluation')->default(0);
            $table->string('trailer')->nullable();
            $table->unsignedInteger('viewer')->default(0)->nullable();
            $table->string('age_group')->default('+16');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('movies');
    }
};
