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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('person_id')->nullable();
            $table->string('family_id')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('religion')->nullable();
            $table->enum('gender', ['male', 'female', 'hidden']);
            $table->string('citizenship');
            $table->text('address');
            $table->string('blood_group');
            $table->string('married_status');
            $table->string('job')->nullable();
            $table->string('last_education')->nullable();
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->text('photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
