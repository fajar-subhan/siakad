<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefRoleMenuMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_role_menu_master', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_master_id')->index()->comment('mst_menu_master.id');
            $table->integer('role_id')->index()->comment('roles.id');
            $table->tinyInteger('active');
            $table->tinyInteger('order');
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
        Schema::dropIfExists('ref_role_menu_master');
    }
}
