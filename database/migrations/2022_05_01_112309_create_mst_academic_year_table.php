<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstAcademicYearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_academic_year', function (Blueprint $table) {
            $table->id();
            $table->string('code',10)->unique();
            $table->string('name',100);
            $table->date('start_date_study');
            $table->date('end_date_study');
            $table->date('start_date_uts')->nullable()->default(NULL);
            $table->date('end_date_uts')->nullable()->default(NULL);
            $table->date('start_date_uas')->nullable()->default(NULL);
            $table->date('end_date_uas')->nullable()->default(NULL);
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('order')->default(1);
            $table->timestamps();

            $table->index(['code']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_academic_year');
    }
}
