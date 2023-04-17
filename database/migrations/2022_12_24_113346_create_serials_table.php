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
        Schema::create('serials', function (Blueprint $table) {
            $table->id();
            $table->string('name',250);
            $table->text('describe');
            $table->string('image')->nullable();
            $table->date('release_year');
            $table->string('trailer')->nullable();
            $table->string('age_group')->default('+16');
            $table->double('evaluation')->default(0);
            $table->boolean('status')->default(false);
            $table->unsignedInteger('viewer')->default(0)->nullable();
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
        Schema::dropIfExists('serials');
    }
};
