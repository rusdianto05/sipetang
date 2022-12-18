<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ket_pindah_penduduk', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('name_id')->unsigned();
            $table->bigInteger('pindah_id')->unsigned();
            $table->date('ktp_expired')->nullable();
            $table->string('shdk')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ket_pindah_penduduk');
    }
};
