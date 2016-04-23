<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZipCodesTable extends Migration
{
    const COLUMN_ZIP        = 0;
    const COLUMN_STATE      = 1;
    const COLUMN_LATITUDE   = 2;
    const COLUMN_LONGITUDE  = 3;
    const COLUMN_CITY       = 4;
    const COLUMN_FULL_STATE = 5;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table zip_codes
        Schema::create('zip_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zip', 5);
            $table->string('state', 2);
            $table->string('latitude', 12);
            $table->string('longitude', 12);
            $table->string('city', 50);
            $table->string('full_state', 50);
        });

        DB::connection()->disableQueryLog();

        // Insert zip_codes
        $batch      = 10000;
        $count      = 0;
        $zipCodes   = array();
        if (($handle = fopen(public_path()."/../database/migrations/zip_codes.csv",'r')) !== FALSE)
        {
            while (($data = fgetcsv($handle, null, ',')) !==FALSE)
            {
                $zipCodes[] = array(
                    'zip'        => $data[self::COLUMN_ZIP],
                    'state'      => $data[self::COLUMN_STATE],
                    'latitude'   => $data[self::COLUMN_LATITUDE],
                    'longitude'  => $data[self::COLUMN_LONGITUDE],
                    'city'       => $data[self::COLUMN_CITY],
                    'full_state' => $data[self::COLUMN_FULL_STATE],
                );
                $count++;

                if ($count >= $batch) {
                    DB::table('zip_codes')->insert($zipCodes);
                    $zipCodes = array();
                    $count = 0;
                }
            }
            fclose($handle);
        }
        DB::table('zip_codes')->insert($zipCodes);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('zip_codes');
    }
}
