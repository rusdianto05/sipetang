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
        Schema::create('mohon_cerai', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('suami_id')->unsigned();
            $table->bigInteger('istri_id')->unsigned();
            $table->bigInteger('surat_id')->unsigned();
            $table->string('sebab')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected']);
            // add relation
            $table->foreign('suami_id')->references('id')->on('users');
            $table->foreign('istri_id')->references('id')->on('users');
            $table->foreign('surat_id')->references('id')->on('surat');
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
        Schema::dropIfExists('mohon_cerai', function (Blueprint $table) {
            $table->dropForeign(['suami_id']);
            $table->dropForeign(['istri_id']);
            $table->dropForeign(['surat_id']);
        });
    }
};
