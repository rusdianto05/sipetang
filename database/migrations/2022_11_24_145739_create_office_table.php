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
        Schema::create('office', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('address');
            $table->string('province');
            $table->string('regency');
            $table->string('sub_district');
            $table->string('village');
            $table->string('postal_code');
            $table->string('camat');
            $table->string('camat_id');
            $table->string('kades');
            $table->string('kades_id');
            $table->string('pamong')->nullable();
            $table->string('pamong_id')->nullable();
            $table->string('ketua_adat')->nullable();
            $table->string('ketua_adat_id')->nullable();

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
        Schema::dropIfExists('office');
    }
};
