<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            
            //foriegn keys:
            $table->foreignId('role_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            //$table->foreignId('author_id')->constrained()->nullabe()->onUpdate('cascade')->onDelete('cascade');
            $table->string('profile_picture')->default('defaultAvatar.png');

            $table->boolean('stauts')->nullable(); //if cleaner, determine if available or not. 
            $table->float('price_per_hour')->nullable(); //if cleaner, place a price per hour
            
            $table->string('phone')->unique();
            $table->string('address');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('zip');
            $table->string('language');
            $table->date('birthdate');
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
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
}
