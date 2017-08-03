<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_subjects', function (Blueprint $table) {
            $table->increments('student_subject_id');
            $table->integer('student_id');
            $table->integer('teacher_id');
            $table->integer('subject_id');
            $table->integer('first_grading')->nullable();
            $table->integer('second_grading')->nullable();
            $table->integer('third_grading')->nullable();
            $table->integer('fourth_grading')->nullable();
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
        Schema::dropIfExists('student_subjects');
    }
}
