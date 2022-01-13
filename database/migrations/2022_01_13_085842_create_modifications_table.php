<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lesson_id')->unsigned();
            $table->string('new_adress')->nullable();
            $table->string('new_postcode', 7)->nullable();
            $table->string('reason');
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->enum('specialty', [0, 1])->default(0);

            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modifications');
    }
}
