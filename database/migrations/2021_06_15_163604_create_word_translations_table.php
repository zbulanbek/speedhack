<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word_translations', function (Blueprint $table) {
            $table->id();
            $table->string('word');
            $table->string('translate')->nullable();
            $table->foreignId('vocabulary_id')
                ->nullable()
                ->constrained('vocabularies');
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
        Schema::dropIfExists('word_translations');
    }
}
