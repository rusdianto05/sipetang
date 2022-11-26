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
        Schema::create('mohon_nikah', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');

            $table->bigInteger('surat_id');
            $table->bigInteger('pasangan_id');
            $table->bigInteger('wali_id');
            $table->bigInteger('pasangan_dulu_id');
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
        Schema::dropIfExists('mohon_nikah');
    }
};
