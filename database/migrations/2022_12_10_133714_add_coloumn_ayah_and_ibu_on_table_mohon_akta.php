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
        Schema::table('mohon_akta', function (Blueprint $table) {
            $table->bigInteger('ayah_id')->unsigned()->nullable();
            $table->bigInteger('ibu_id')->unsigned()->nullable();
            $table->string('hari_lahir')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mohon_akta', function (Blueprint $table) {
            $table->dropColumn('ayah_id');
            $table->dropColumn('ibu_id');
            $table->dropColumn('hari_lahir');
        });
    }
};
