<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstPresenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_presence', function (Blueprint $table) {
            $table->id();
            $table->string('subject_code',10)->index();
            $table->string('nidn',12)->index();
            $table->string('major_code',10)->index();
            $table->string('room_code',10)->index();
            $table->string('discussion_topic');
            $table->integer('meeting_to');
            $table->tinyInteger('active')->default(1);
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
        Schema::dropIfExists('mst_presence');
    }
}
