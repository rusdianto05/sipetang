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
        Schema::table('ket_usaha', function (Blueprint $table) {
            $table->foreign('domisili_usaha_lokal_id')->references('id')->on('ket_domisili_usaha_lokal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ket_usaha', function (Blueprint $table) {
            $table->dropForeign(['domisili_usaha_lokal_id']);
        });
    }
};
