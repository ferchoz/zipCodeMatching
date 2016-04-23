<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table customers
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('zip_code', 5);
        });

        // Insert Customers
        DB::table('customers')->insert(
            array(
                array('name' => 'Michael','zip_code' => '85273'),
                array('name' => 'James','zip_code' => '85750'),
                array('name' => 'Brian','zip_code' => '85751'),
                array('name' => 'Nicholas','zip_code' => '85383'),
                array('name' => 'Jennifer','zip_code' => '85716'),
                array('name' => 'Christopher','zip_code' => '85014'),
                array('name' => 'Michael','zip_code' => '85751'),
                array('name' => 'Patricia','zip_code' => '95032'),
                array('name' => 'Beth','zip_code' => '94556'),
                array('name' => 'Cathy','zip_code' => '92260'),
                array('name' => 'Harold','zip_code' => '92120'),
                array('name' => 'Robin','zip_code' => '94062'),
                array('name' => 'James','zip_code' => '90503'),
                array('name' => 'Douglas','zip_code' => '32159'),
                array('name' => 'Donald','zip_code' => '32404'),
                array('name' => 'Ilene','zip_code' => '33140'),
                array('name' => 'William','zip_code' => '33417'),
                array('name' => 'Lynn','zip_code' => '32789'),
                array('name' => 'Leonie','zip_code' => '33417'),
                array('name' => 'Katherine','zip_code' => '32034'),
                array('name' => 'Melissa','zip_code' => '30516'),
                array('name' => 'Kimberly','zip_code' => '30345'),
                array('name' => 'Richard','zip_code' => '30606'),
                array('name' => 'Richard','zip_code' => '30312'),
                array('name' => 'Ayn','zip_code' => '31901'),
                array('name' => 'Bruce','zip_code' => '31410'),
                array('name' => 'Fred','zip_code' => '89451'),
                array('name' => 'Robert','zip_code' => '89110'),
                array('name' => 'David','zip_code' => '89042'),
                array('name' => 'Maureen','zip_code' => '89074'),
                array('name' => 'Mary Sue','zip_code' => '89705'),
                array('name' => 'Janet','zip_code' => '89144'),
                array('name' => 'John','zip_code' => '89145'),
                array('name' => 'Rand','zip_code' => '12580'),
                array('name' => 'Kathy','zip_code' => '10604'),
                array('name' => 'Susan','zip_code' => '13601'),
                array('name' => 'Robin','zip_code' => '10021'),
                array('name' => 'Peter','zip_code' => '12550'),
                array('name' => 'Diana','zip_code' => '10603'),
                array('name' => 'Richard','zip_code' => '12018')
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
        Schema::drop('customers');
    }
}
