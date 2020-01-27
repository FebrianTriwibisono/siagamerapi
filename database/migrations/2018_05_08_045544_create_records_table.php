<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('seismik',11);
            $table->decimal('deformasi',7,2);
            $table->decimal('intensitas_gas',7,2);
            $table->decimal('suhu',7,2);
            $table->decimal('kemungkinan',7,2);
            $table->datetime('tgl');
            $table->unsignedInteger('pid');
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
        Schema::dropIfExists('records');
    }
}
