<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->string('telefono');
            $table->string('direccion');
            $table->enum('categoria',['Amigo', 'Familia', 'Favoritos']);

            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');     

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
        Schema::drop('contactos');
    }
}
