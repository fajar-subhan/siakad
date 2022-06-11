<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Null_;

class CreateMstCollegeStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_college_student', function (Blueprint $table) {
            $table->id();
            $table->string('nim',12)->unique();
            $table->string('name',100);
            $table->string('email',50); 
            $table->string('major_code',10)->index();
            $table->integer('semester_id')->index();
            $table->string('academic_year_code',10)->index();
            $table->text('address')->nullable()->default(NULL);
            $table->integer('created_by')->index();
            $table->integer('updated_by')->index();            
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('order')->default(1);            
            $table->timestamps();
            $table->index(['nim']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_college_student');
    }
}
