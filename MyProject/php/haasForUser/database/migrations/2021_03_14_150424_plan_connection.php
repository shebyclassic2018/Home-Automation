<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlanConnection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_connection', function(Blueprint $table){
            $table->integer('plan_id')->unsigned();
            $table->integer('connection_id')->unsigned();
            $table->primary(array('plan_id', 'connection_id'));
            $table->foreign('plan_id')->references('id')->on('plan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('connection_id')->references('id')->on('connection')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
