<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicRecordsDbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_records_dbs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('form_id')->unique();
            $table->string('reg_code')->unique();

            $table->integer('roll_no')->nullable();
            
            $table->string('ssc_school_name')->nullable();
            $table->string('hs_school_name')->nullable();
            $table->string('diploma_college_name')->nullable();
            $table->string('grad_college_name')->nullable();
            $table->string('ssc_medium')->nullable();
            $table->string('hs_medium')->nullable();
            $table->string('diploma_medium')->nullable();
            $table->string('grad_medium')->nullable();
            $table->string('ssc_division')->nullable();
            $table->string('hs_division')->nullable();
            $table->string('diploma_division')->nullable();
            $table->string('grad_division')->nullable();
            $table->string('ssc_board')->nullable();
            $table->string('hs_board')->nullable();
            $table->string('diploma_board')->nullable();
            $table->string('grad_board')->nullable();

            $table->float('ssc_percentage')->nullable();  //Float
            $table->float('hs_percentage')->nullable();
            $table->float('diploma_percentage')->nullable();
            $table->float('grad_percentage')->nullable();
            $table->float('ssc_agg')->nullable();
            $table->float('hs_agg')->nullable();
            $table->float('diploma_agg')->nullable();
            $table->float('grad_agg')->nullable();

            $table->string('ssc_no_of_sub')->nullable();
            $table->string('hs_no_of_sub')->nullable();
            $table->string('diploma_no_of_sub')->nullable();
            $table->string('grad_no_of_sub')->nullable();
            $table->string('btech_college_name')->nullable();
            $table->string('btech_medium')->nullable();
            $table->string('btech_division')->nullable();
            $table->string('btech_board')->nullable();
            $table->float('btech_percentage')->nullable(); //Float
            $table->float('btech_agg')->nullable();//Float
            

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
        Schema::dropIfExists('academic_records_dbs');
    }
}
