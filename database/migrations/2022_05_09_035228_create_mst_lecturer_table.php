<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstLecturerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_lecturer', function (Blueprint $table) {
            $table->id();
            $table->string('nidn',12)->unique();
            $table->string('name',100);
            $table->string('email',50); 
            $table->string('faculty_code',10);
            $table->string('number_phone',13);
            $table->integer('created_by')->index();
            $table->integer('updated_by')->index();            
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('order')->default(1);     
            $table->timestamps();

            $table->index(['nidn','faculty_code']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_lecturer');
    }
}
