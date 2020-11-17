<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('course_id')->nullable();
            $table->string('enrollment_id')->nullable();
            $table->char('status')->comment('1=enable,2=disable')->nullable();
            $table->char('is_reg_fee_paid')->comment('1=no,2=yes')->nullable();
            $table->char('is_exam_fee_paid')->comment('1=no,2=yes')->nullable();
            $table->char('is_result_uploaded')->comment('1=no,2=yes')->nullable();
            $table->date('reg_fee_paid_date')->nullable();
            $table->date('exam_fee_paid_date')->nullable();
            $table->date('result_uploaded_date')->nullable();
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
        Schema::dropIfExists('students');
    }
}
