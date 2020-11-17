<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_result', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id')->nullable();
            $table->double('theory_total_mark')->nullable();
            $table->double('theory_obtain_mark')->nullable();
            $table->double('practical_total_mark')->nullable();
            $table->double('practical_obtain_mark')->nullable();
            $table->date('date_of_issue')->nullable();
            $table->string('grade')->nullable();
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
        Schema::dropIfExists('student_results');
    }
}
