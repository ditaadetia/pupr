<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable;
            $table->string('foto')->nullable;
            $table->string('email')->nullable;
            // $table->timestamp('email_verified_at');
            $table->string('username')->nullable;
            $table->string('password')->nullable;
            $table->string('no_hp')->nullable;
            $table->string('kontak_darurat')->nullable;
            $table->string('alamat')->nullable;
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
        Schema::dropIfExists('tenants');
    }
}
