<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('student_id')->nullable();
            $table->biginteger('total_marks_obtained')->nullable();
            $table->biginteger('theroy_marks_obtained')->nullable();
            $table->biginteger('theory_full_marks')->nullable();
            $table->biginteger('prac_full_marks')->nullable();
            $table->string('grade')->nullable();
            $table->biginteger('percentage')->nullable();
            $table->biginteger('prac_marks_obtained')->nullable();
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
        Schema::dropIfExists('marks');
    }
}
