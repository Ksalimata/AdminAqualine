<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role_id')->unsigned()->nullable();
            $table->foreign('role_id')
                  ->references('id')->on('roles')
                  ->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                "nom" => "Bamba",
                "prenom" => "medji",
                "telephone" => "77120082",
                "username" => "medjiking",
                "email" => "bmedji1@gmail.com",
                "password" => bcrypt("medji"),
                "role_id" => 1,
                "created_at" => now()
            )
        );
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
