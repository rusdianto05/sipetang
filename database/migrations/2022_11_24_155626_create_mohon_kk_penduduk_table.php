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
        Schema::create('mohon_kk_penduduk', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();

            $table->bigInteger('surat_id')->unsigned();
            $table->bigInteger('mohon_kk_id')->unsigned();
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
        Schema::dropIfExists('mohon_kk_penduduk');
    }
};
