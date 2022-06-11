<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstMenuDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_menu_detail', function (Blueprint $table) {
            $table->id();
            $table->string('name',50)->unique();
            $table->string('route_type',50)->comment('URI | ROUTE_NAME');
            $table->string('route',50)->unique();
            $table->tinyInteger('active')->default('1');
            $table->tinyInteger('order')->default('1');
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
        Schema::dropIfExists('mst_menu_detail');
    }
}
