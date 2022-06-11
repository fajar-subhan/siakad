<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstCourseScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_course_schedule', function (Blueprint $table) {
            $table->id();
            $table->string('day',12);
            $table->string('subject_code',10)->index();
            $table->string('nidn',12)->index();
            $table->integer('hours_id')->index();
            $table->string('major_code',10)->index();
            $table->string('room_code',10)->index();
            $table->integer('semester_id')->index();
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('order')->default(1);
            $table->integer('created_by')->index();
            $table->integer('updated_by')->index(); 
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
        Schema::dropIfExists('mst_course_schedule');
    }
}
