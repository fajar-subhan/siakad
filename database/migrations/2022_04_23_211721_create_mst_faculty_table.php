<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstFacultyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_faculty', function (Blueprint $table) {
            $table->id();
            $table->string('code',10)->unique();
            $table->string('name',50);
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
        Schema::dropIfExists('mst_faculty');
    }
}
