<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstCampusInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_campus_info', function (Blueprint $table) {
            $table->id();
            $table->string('name_campus');
            $table->string('email')->nullable()->default(NULL);
            $table->string('web')->nullable()->default(NULL);
            $table->string('phone_number')->nullable()->default(NULL);
            $table->string('fax_number')->nullable()->default(NULL);
            $table->text('address')->nullable()->default(NULL);
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
        Schema::dropIfExists('mst_campus_info');
    }
}
