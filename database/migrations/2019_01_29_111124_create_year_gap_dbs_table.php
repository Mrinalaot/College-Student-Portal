<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYearGapDbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('year_gap_dbs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roll_no')->nullable();

            $table->integer('form_id')->unique();
            $table->string('reg_code')->unique();
            
            $table->integer('ssc_year_of_join')->nullable();
            $table->integer('ssc_year_of_pass')->nullable();
            $table->integer('eleven_year_of_join')->nullable();
            $table->integer('eleven_year_of_pass')->nullable();
            $table->integer('hs_year_of_join')->nullable();
            $table->integer('hs_year_of_pass')->nullable();
            $table->integer('diploma_year_of_join')->nullable();
            $table->integer('diploma_year_of_pass')->nullable();
            $table->integer('grad_year_of_join')->nullable();
            $table->integer('grad_year_of_pass')->nullable();
            $table->integer('mca_year_of_join')->nullable();
            $table->integer('mca_year_of_pass')->nullable();
            $table->integer('btech_year_of_join')->nullable();
            $table->integer('btech_year_of_pass')->nullable();
            $table->integer('mtech_year_of_join')->nullable();
            $table->integer('mtech_year_of_pass')->nullable();

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
        Schema::dropIfExists('year_gap_dbs');
    }
}
