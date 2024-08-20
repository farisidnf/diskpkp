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
            $table->string('username');
            $table->string('name');
            $table->string('jabatan')->nullable();
            $table->string('bidang')->nullable();
            $table->integer('fk_bidang')->nullable();
            $table->string('nrk')->nullable();
            $table->string('nib')->nullable();
            $table->string('role')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('fk_lokasi_sudin')->nullable();
            $table->string('password');
            $table->string('status')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
