<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBtechMtechMcaDbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('btech_mtech_mca_dbs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roll_no')->nullable();

            $table->integer('form_id')->unique();
            $table->string('reg_code')->unique();

            $table->integer('sgpa_1')->nullable();
            $table->integer('sgpa_2')->nullable();
            $table->integer('sgpa_3')->nullable();
            $table->integer('sgpa_4')->nullable();
            $table->integer('sgpa_5')->nullable();
            $table->integer('sgpa_6')->nullable();
            $table->integer('sgpa_7')->nullable();
            $table->integer('sgpa_8')->nullable();
            $table->integer('no_of_backlog_1')->nullable();
            $table->integer('no_of_backlog_2')->nullable();
            $table->integer('no_of_backlog_3')->nullable();
            $table->integer('no_of_backlog_4')->nullable();
            $table->integer('no_of_backlog_5')->nullable();
            $table->integer('no_of_backlog_6')->nullable();
            $table->integer('no_of_backlog_7')->nullable();
            $table->integer('no_of_backlog_8')->nullable();
            $table->string('backlog_sub_sem_1')->nullable();
            $table->string('backlog_sub_sem_2')->nullable();
            $table->string('backlog_sub_sem_3')->nullable();
            $table->string('backlog_sub_sem_4')->nullable();
            $table->string('backlog_sub_sem_5')->nullable();
            $table->string('backlog_sub_sem_6')->nullable();
            $table->string('backlog_sub_sem_7')->nullable();
            $table->string('backlog_sub_sem_8')->nullable();
            $table->string('attendance_sem_1')->nullable();
            $table->string('attendance_sem_2')->nullable();
            $table->string('attendance_sem_3')->nullable();
            $table->string('attendance_sem_4')->nullable();
            $table->string('attendance_sem_5')->nullable();
            $table->string('attendance_sem_6')->nullable();
            $table->string('attendance_sem_7')->nullable();
            $table->string('attendance_sem_8')->nullable();

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
        Schema::dropIfExists('btech_mtech_mca_dbs');
    }
}
