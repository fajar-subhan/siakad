<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefIconTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_icon', function (Blueprint $table) {
            $table->id();
            $table->string('name',50)->unique();
            $table->text('icon');
            $table->string('type_icon')->comment('FontAwesome|SVG|IMG');
            $table->string('path_icon',50);
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
        Schema::dropIfExists('ref_icon');
    }
}
