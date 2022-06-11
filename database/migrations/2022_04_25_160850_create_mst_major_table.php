<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstMajorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_major', function (Blueprint $table) {
            $table->id();
            $table->string('code',10)->unique();
            $table->string('name',50);
            $table->string('faculty_code',10)->index();
            $table->integer('college_level_id')->index();
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
        Schema::dropIfExists('mst_major');
    }
}
