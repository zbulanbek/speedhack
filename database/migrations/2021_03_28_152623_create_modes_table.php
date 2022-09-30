<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('monday', 800)->nullable();
            $table->string('tuesday', 800)->nullable();
            $table->string('wednesday', 800)->nullable();
            $table->string('thursday', 800)->nullable();
            $table->string('friday', 800)->nullable();
            $table->string('saturday', 800)->nullable();
            $table->string('sunday', 800)->nullable();
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
        Schema::dropIfExists('modes');
    }
}
