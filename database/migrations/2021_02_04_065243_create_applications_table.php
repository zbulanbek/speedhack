<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->foreignId('status_id')
                ->nullable()
                ->constrained('application_statuses')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreignId('methodist_id')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('methodist_status_id')
                ->nullable()
                ->constrained('methodist_statuses')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->datetime('start_time')->nullable();
            $table->datetime('end_time')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('applications');
    }
}
