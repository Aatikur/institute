<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('branch_id')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('email_address')->nullable();
            $table->string('residence_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->date('dob')->nullable();
            $table->string('qualification')->nullable();
            $table->string('center_name')->nullable();
            $table->string('center_address')->nullable();
            $table->string('center_city')->nullable();
            $table->string('center_state')->nullable();
            $table->string('center_district')->nullable();
            $table->string('center_affiliated_by')->nullable();
            $table->integer('ph_no')->nullable();
            $table->integer('theory_room')->nullable();
            $table->integer('practical_room')->nullable();
            $table->integer('no_of_computers')->nullable();
            $table->integer('no_of_faculties')->nullable();
            $table->integer('no_of_colleges')->nullable();
            $table->integer('no_of_schools')->nullable();
            $table->string('computer_spec')->nullable();
            $table->char('course_interested')->comment('1=software,2=hardware,3=university')->nullable();
            $table->string('center_photo')->nullable();
            $table->string('voter_card')->nullable();
            $table->string('pan_card')->nullable();
            $table->string('trade_licence')->nullable();
            $table->string('theory_room_photo')->nullable();
            $table->string('practical_room_photo')->nullable();
            $table->string('office_room_photo')->nullable();
            $table->string('front_side_photo')->nullable();
           
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
        Schema::dropIfExists('branch_details');
    }
}
