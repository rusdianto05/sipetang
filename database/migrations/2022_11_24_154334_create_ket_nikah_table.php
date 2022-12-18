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
        Schema::create('ket_nikah', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('ayah_id')->unsigned();
            $table->bigInteger('ibu_id')->unsigned();

            $table->bigInteger('surat_id')->unsigned();
            $table->bigInteger('pasangan_id')->unsigned();
            $table->bigInteger('ayah_pasangan_id')->unsigned();
            $table->bigInteger('ibu_pasangan_id')->unsigned();
            $table->bigInteger('wali_id')->unsigned();
            $table->bigInteger('pasangan_dulu_id')->nullable();
            $table->string('place');
            $table->text('mas_kawin')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected']);
            $table->timestamp('time');
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
        Schema::dropIfExists('ket_nikah');
    }
};
