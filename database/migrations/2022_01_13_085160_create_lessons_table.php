<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('instructor_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->string('adress');
            $table->string('postcode', 7);
            $table->string('goals');
            $table->string('comments')->nullable();
            $table->datetime('date');

            $table->enum('student_specialty', [0, 1, 2, 3])->default(0);
            $table->enum('instructor_specialty', [0, 1, 2, 3])->default(0);

            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
