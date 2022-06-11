<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstUserLogActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_user_log_activity', function (Blueprint $table) {
            $table->id();
            $table->string('user_activity_module',50)->nullable();
            $table->string('user_activity_name',30)->nullable();
            $table->string('user_activity_desc',50)->nullable();
            $table->string('user_activity_address',50)->nullable();
            $table->string('user_activity_browser',50)->nullable();
            $table->string('user_activity_os',50)->nullable();
            $table->unsignedBigInteger('user_id')->comment('users.id')->index();
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
        Schema::dropIfExists('mst_user_log_activity');
    }
}
