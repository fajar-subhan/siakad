<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstKhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_khs', function (Blueprint $table) {
            $table->id();
            $table->string('nim',12)->index();
            $table->string('nidn',12)->index();
            $table->string('subject_code',10)->index();
            $table->string('nilai_uts');
            $table->string('nilai_uas');
            $table->string('nilai_tugas');
            $table->string('nilai_kehadiran');
            $table->integer('semester_id')->index();
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
        Schema::dropIfExists('mst_khs');
    }
}
