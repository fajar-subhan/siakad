<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstKrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_krs', function (Blueprint $table) {
            $table->id();
            $table->string('nim',12);
            $table->string('nidn',12);
            $table->string('academic_code',10);
            $table->string('subject_code',10);
            $table->integer('semester_id');
            $table->tinyInteger('order')->default(1);
            $table->timestamps();

            $table->index(['nim','nidn','academic_code','subject_code','semester_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_krs');
    }
}
