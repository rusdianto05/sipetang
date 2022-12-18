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
        Schema::create('mohon_akta', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();

            $table->bigInteger('surat_id')->unsigned();
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
        Schema::dropIfExists('mohon_akta');
    }
};
