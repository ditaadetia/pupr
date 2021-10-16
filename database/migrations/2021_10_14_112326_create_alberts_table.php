<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alberts', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('foto')->nullable;
            $table->string('jenis')->nullable;
            $table->string('kegunaan')->nullable;
            $table->integer('harga_sewa_perjam');
            $table->integer('harga_sewa_perhari');
            $table->string('keterangan')->nullable;
            $table->string('kondisi')->nullable;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alberts');
    }
}
