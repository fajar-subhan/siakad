<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstCurriculumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_curriculum', function (Blueprint $table) {
            $table->id();
            $table->string('code_major',10)->index();
            $table->string('code_subject',10)->index();
            $table->tinyInteger('semester');
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('order')->default(1);
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
        Schema::dropIfExists('mst_curriculum');
    }
}
