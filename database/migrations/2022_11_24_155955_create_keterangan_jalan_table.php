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
        Schema::create('keterangan_jalan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();

            $table->bigInteger('surat_id')->unsigned();
            $table->string('kepala_keluarga');
            $table->text('keperluan');
            $table->enum('status', ['pending', 'approved', 'rejected']);
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
        Schema::dropIfExists('keterangan_jalan');
    }
};
