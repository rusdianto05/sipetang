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
        Schema::create('ket_pindah', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');

            $table->bigInteger('surat_id');
            $table->enum('status', ['pending', 'approved', 'rejected']);
            $table->text('alamat_pindah');
            $table->string('kodepos');
            $table->text('alasan_pindah');
            $table->date('tanggal_pindah');
            $table->date('valid_from');
            $table->date('valid_until');

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
        Schema::dropIfExists('ket_pindah');
    }
};
