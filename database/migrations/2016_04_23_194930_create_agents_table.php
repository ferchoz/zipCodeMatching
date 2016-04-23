<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table agents
        Schema::create('agents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        // Insert Customers
        DB::table('agents')->insert(
            array(
                array('name' => 'Agent 1'),
                array('name' => 'Agent 2'),
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
        Schema::drop('agents');
    }
}
