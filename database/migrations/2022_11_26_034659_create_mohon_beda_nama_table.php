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
        Schema::create('mohon_beda_nama', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('surat_id');
            $table->bigInteger('ket_beda_nama_id');
            $table->string('akta_id');
            $table->text('alasan');
            $table->text('bukti')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected']);

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
        Schema::dropIfExists('mohon_beda_nama');
    }
};
