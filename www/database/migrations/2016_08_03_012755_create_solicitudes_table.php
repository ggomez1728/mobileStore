<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('mobile')->unsigned();
            $table->integer('status')->unsigned();
            $table->integer('id_client')->unsigned();
            $table->text('fails');
            $table->text('others');
            $table->timestamps();
            $table->foreign('mobile')
                ->references('id')
                ->on('mobiles');
            $table->foreign('status')
                ->references('id')
                ->on('status_solicitudes');
            $table->foreign('id_client')
                ->references('id')
                ->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('solicitudes');
    }
}
