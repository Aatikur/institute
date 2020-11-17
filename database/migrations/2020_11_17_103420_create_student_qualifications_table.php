<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_qualification', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id')->nullable();
            $table->string('exam_name');
            $table->string('board')->nullable();
            $table->string('college')->nullable();
            $table->year('year_of_passing')->nullable();
            $table->double('marks_obtained')->nullable();
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
        Schema::dropIfExists('student_qualifications');
    }
}
