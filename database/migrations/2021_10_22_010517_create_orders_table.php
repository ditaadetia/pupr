<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id');
            $table->foreignId('category_order_id');
            $table->string('nama_instansi')->nullable;
            $table->string('jabatan')->nullable;
            $table->string('nama_bidang_hukum')->nullable;
            $table->string('alamat_instansi')->nullable;
            $table->string('nama_kegiatan');
            $table->string('ktp');
            $table->string('surat_permohonan');
            $table->string('akta_notaris')->nullable;
            $table->string('surat_ket')->nullable;
            $table->enum('ket_verif_admin', ['belum', 'verif', 'tolak'])->nullable;
            $table->enum('ket_persetujuan_kepala_uptd', ['belum', 'setuju', 'tolak'])->nullable;
            $table->enum('ket_persetujuan_kepala_dinas', ['belum', 'setuju', 'tolak'])->nullable;
            $table->string('ttd_kepala_uptd')->nullable;
            $table->string('ttd_kepala_dinas')->nullable;
            $table->string('ket_konfirmasi')->nullable;
            $table->dateTime('tanggal_mulai')->nullable;
            $table->dateTime('tanggal_selesai')->nullable;
            $table->string('dokumen_sewa')->nullable;
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
        Schema::dropIfExists('orders');
    }
}
