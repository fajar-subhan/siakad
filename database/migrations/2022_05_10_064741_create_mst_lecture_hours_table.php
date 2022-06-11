<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstLectureHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_lecture_hours', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
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
        Schema::dropIfExists('mst_lecture_hours');
    }
}
