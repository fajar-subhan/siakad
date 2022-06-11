<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nim',12)->nullable()->default(NULL)->unique();
            $table->string('nidn',12)->nullable()->default(NULL)->unique();
            $table->tinyInteger('user_login')->default(0);
            $table->integer('user_active')->default(1);
            $table->integer('user_order')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->integer('user_created_by')->nullable();
            $table->integer('user_updated_by')->nullable();

            $table->index(['nim','nidn']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
