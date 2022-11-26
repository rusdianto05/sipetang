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
        Schema::create('ket_wali', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');

            $table->bigInteger('surat_id');
            $table->string('regency');
            $table->string('sub_district');
            $table->string('village');
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
        Schema::dropIfExists('ket_wali');
    }
};
