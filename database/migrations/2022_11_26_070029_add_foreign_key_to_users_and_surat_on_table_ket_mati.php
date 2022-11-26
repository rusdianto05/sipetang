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
        Schema::table('ket_mati', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('surat_id')->references('id')->on('surat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ket_mati', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['surat_id']);
        });
    }
};
