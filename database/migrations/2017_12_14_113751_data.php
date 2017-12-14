<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Data extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pembayaran_tertinggi');
            $table->string('pembayaran_terendah');
            $table->string('tips_tertinggi');
            $table->string('tips_terendah');
            $table->string('pelayanan_tertinggi');
            $table->string('pelayanan_terendah');
         
            $table->timestamp('created_at');
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
