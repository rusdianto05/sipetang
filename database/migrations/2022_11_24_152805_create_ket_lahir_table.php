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
        Schema::create('ket_lahir', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('surat_id');
            $table->enum('kondisi', ['hidup', 'mati']);
            $table->text('lama_kandungan')->nullable();
            $table->bigInteger('pelapor_id')->nullable();
            $table->string('pelapor_hubungan')->nullable();
            $table->timestamp('tanggal_lahir');
            $table->string('tempat_lahir');
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
        Schema::dropIfExists('ket_lahir');
    }
};
