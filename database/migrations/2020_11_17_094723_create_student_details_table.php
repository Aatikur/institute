<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id')->nullable();
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('husband_name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->double('state_code')->nullable();
            $table->string('country')->nullable();
            $table->double('pin')->nullable();
            $table->double('tel_no')->nullable();
            $table->double('mob_no')->nullable();
            $table->string('email')->nullable();
            $table->date('dob')->nullable();
            $table->char('category')->comment('1=gen,2=sc,3=st,4=handicapped')->nullable();
            $table->char('gender')->comment('1=male,2=female')->nullable();
            $table->string('medium')->comment('1=english,2=hindi')->nullable();
            $table->string('image')->nullable();
          
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
        Schema::dropIfExists('student_details');
    }
}
