<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            //foriegn keys
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade'); //customer id

            $table->unsignedBigInteger('cleaner_id');
            $table->foreign('cleaner_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade'); //cleaner id

            $table->foreignId('service_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            //end of foriegn keys

            $table->string('house_access');
            $table->date('day');
            $table->time('from');
            $table->time('to');
            $table->string('preferred_language');

            // 0 -> declined ,, 1 -> accepted, null -> waiting
            $table->boolean('status')->nullable();
            
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
        Schema::dropIfExists('orders');
    }
}
