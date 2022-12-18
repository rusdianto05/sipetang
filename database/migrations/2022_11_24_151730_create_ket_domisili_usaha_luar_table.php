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
        Schema::create('ket_domisili_usaha_luar', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('surat_id')->unsigned();
            $table->string('jenis_identitas');
            $table->string('no_identitas');
            $table->string('name');
            $table->string('jenis');
            $table->string('register_id')->nullable();
            $table->string('bangunan');
            $table->text('tujuan');
            $table->string('status_bangunan');
            $table->text('address');
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
        Schema::dropIfExists('ket_domisili_usaha_luar');
    }
};
