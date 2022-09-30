<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->foreignId('topic_id')->nullable();
            $table->string('type')->nullable();
            $table->text('text')->nullable();
            $table->boolean('is_show')->nullable();
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
        Schema::dropIfExists('topic_blocks');
    }
}
