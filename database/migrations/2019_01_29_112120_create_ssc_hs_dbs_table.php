<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSscHsDbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ssc_hs_dbs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('form_id')->unique();
            $table->string('reg_code')->unique();

            $table->integer('roll_no')->nullable();

            $table->string('ssc_sub_name_1')->nullable();
            $table->string('ssc_sub_name_2')->nullable();
            $table->string('ssc_sub_name_3')->nullable();
            $table->string('ssc_sub_name_4')->nullable();
            $table->string('ssc_sub_name_5')->nullable();
            $table->string('ssc_sub_name_6')->nullable();
            $table->string('ssc_sub_name_7')->nullable();
            $table->string('ssc_sub_name_8')->nullable();
            $table->string('ssc_sub_name_9')->nullable();
            $table->integer('ssc_sub_total_1')->nullable();
            $table->integer('ssc_sub_total_2')->nullable();
            $table->integer('ssc_sub_total_3')->nullable();
            $table->integer('ssc_sub_total_4')->nullable();
            $table->integer('ssc_sub_total_5')->nullable();
            $table->integer('ssc_sub_total_6')->nullable();
            $table->integer('ssc_sub_total_7')->nullable();
            $table->integer('ssc_sub_total_8')->nullable();
            $table->integer('ssc_sub_total_9')->nullable();
            $table->integer('ssc_sub_marks_1')->nullable();
            $table->integer('ssc_sub_marks_2')->nullable();
            $table->integer('ssc_sub_marks_3')->nullable();
            $table->integer('ssc_sub_marks_4')->nullable();
            $table->integer('ssc_sub_marks_5')->nullable();
            $table->integer('ssc_sub_marks_6')->nullable();
            $table->integer('ssc_sub_marks_7')->nullable();
            $table->integer('ssc_sub_marks_8')->nullable();
            $table->integer('ssc_sub_marks_9')->nullable();

            $table->string('hs_sub_name_1')->nullable();
            $table->string('hs_sub_name_2')->nullable();
            $table->string('hs_sub_name_3')->nullable();
            $table->string('hs_sub_name_4')->nullable();
            $table->string('hs_sub_name_5')->nullable();
            $table->string('hs_sub_name_6')->nullable();
            $table->string('hs_sub_name_7')->nullable();
            $table->string('hs_sub_name_8')->nullable();
            $table->string('hs_sub_name_9')->nullable();
            $table->integer('hs_sub_total_1')->nullable();
            $table->integer('hs_sub_total_2')->nullable();
            $table->integer('hs_sub_total_3')->nullable();
            $table->integer('hs_sub_total_4')->nullable();
            $table->integer('hs_sub_total_5')->nullable();
            $table->integer('hs_sub_total_6')->nullable();
            $table->integer('hs_sub_total_7')->nullable();
            $table->integer('hs_sub_total_8')->nullable();
            $table->integer('hs_sub_total_9')->nullable();
            $table->integer('hs_sub_marks_1')->nullable();
            $table->integer('hs_sub_marks_2')->nullable();
            $table->integer('hs_sub_marks_3')->nullable();
            $table->integer('hs_sub_marks_4')->nullable();
            $table->integer('hs_sub_marks_5')->nullable();
            $table->integer('hs_sub_marks_6')->nullable();
            $table->integer('hs_sub_marks_7')->nullable();
            $table->integer('hs_sub_marks_8')->nullable();
            $table->integer('hs_sub_marks_9')->nullable();

            $table->integer('pcm_total_marks')->nullable();

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
        Schema::dropIfExists('ssc_hs_dbs');
    }
}
