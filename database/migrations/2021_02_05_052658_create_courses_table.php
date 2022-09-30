<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('author_id')->unsigned()->nullable();
            $table->foreign('author_id')->references('id')->on('admin_users');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('text')->nullable();
            $table->text('image')->nullable();
            $table->text('body')->nullable();
            $table->string('duration')->nullable();
            $table->double('price')->nullable();
            $table->boolean('is_visible')->default(1);
            $table->foreignId('course_category_id')
                ->nullable()
                ->constrained('course_categories')
                ->onDelete('set null')->cascadeOnUpdate();
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
        Schema::dropIfExists('courses');
    }
}
