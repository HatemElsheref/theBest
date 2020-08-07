<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['admin','moderator'])->default('moderator');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->string('lang')->nullable();
            $table->string('phone')->unique();
            $table->integer('role_id')->unsigned();
            $table->enum('gender',['male','female'])->default('male')->nullable();
            $table->boolean('online')->default(false)->nullable();
            $table->boolean('blocked')->default(false)->nullable();
            $table->string('password');
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
        Schema::dropIfExists('admins');
    }
}
