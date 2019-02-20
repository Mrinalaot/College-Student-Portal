<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentDbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_dbs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roll_no')->nullable();

            $table->integer('form_id')->unique();
            $table->string('reg_code')->unique();

            $table->string('name')->nullable();
            $table->integer('year_of_admission')->nullable();
            $table->integer('current_year')->nullable();

            $table->integer('registration_no')->nullable();         //check

            $table->string('is_readmission')->nullable();
            $table->integer('actual_year_of_admission')->nullable();
            
            $table->integer('enrollment_no')->nullable();
            $table->string('rank_type')->nullable();
            $table->integer('rank')->nullable();
            $table->string('is_tfw')->nullable();
            $table->string('discipline')->nullable();
            $table->string('is_lateral')->nullable();

            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('guardian_name')->nullable();
            $table->integer('father_age')->nullable();
            $table->integer('mother_age')->nullable();
            $table->integer('guardian_age')->nullable();
            $table->string('father_qualification')->nullable();
            $table->string('mother_qualification')->nullable();
            $table->string('guardian_qualification')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('guardian_occupation')->nullable();
            $table->string('father_org')->nullable();
            $table->string('mother_org')->nullable();
            $table->string('guardian_org')->nullable();
            $table->string('voter_no')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('passport_no')->nullable();
            $table->date('dob')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('nationality')->nullable();
            $table->string('sex')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('category')->nullable();
            $table->string('residential_status')->nullable();
            $table->string('religion')->nullable();
            $table->string('is_minority')->nullable();

            $table->integer('family_income')->nullable();
            $table->string('is_scholar')->nullable();
            $table->string('additional_info')->nullable();
            $table->string('is_migrate')->nullable();
            $table->string('mi_institute')->nullable();
            $table->string('mi_session')->nullable();
            $table->string('mi_university')->nullable();

            $table->string('permanent_add')->nullable();
            $table->string('present_add')->nullable();
            $table->string('present_city')->nullable();
            $table->string('pin_no')->nullable();
            $table->integer('telephone_no')->nullable();
            $table->integer('guardian_1_contact')->nullable();
            $table->integer('guardian_2_contact')->nullable();
            $table->integer('stu_mobile1_no')->nullable();
            $table->integer('stu_mobile2_no')->nullable();
            $table->string('aot_mail_id')->nullable();
            $table->string('alt_mail_id')->nullable();
            $table->string('lang_known')->nullable();

            $table->string('status')->default('0');
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
        Schema::dropIfExists('student_dbs');
    }
}
