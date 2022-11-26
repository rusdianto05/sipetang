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
        Schema::table('mohon_beda_nama', function (Blueprint $table) {
            $table->foreign('ket_beda_nama_id')->references('id')->on('ket_beda_nama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mohon_beda_nama', function (Blueprint $table) {
            $table->dropForeign(['ket_beda_nama_id']);
        });
    }
};
