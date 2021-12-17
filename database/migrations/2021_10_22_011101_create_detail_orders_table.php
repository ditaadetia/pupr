<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->foreignId('equipment_id');
            $table->integer('jumlah_jam_sewa');
            $table->integer('jumlah_hari_sewa');
            $table->integer('harga');
            $table->dateTime('tanggal_ambil')->nullable;
            $table->dateTime('tanggal_kembali')->nullable;
            $table->enum('status', ['Selesai', 'Sedang Dipakai', 'Belum Diambil'])->nullable;
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
        Schema::dropIfExists('detail_orders');
    }
}
