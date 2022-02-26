<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('room_code');
            $table->integer('capacity');
            $table->integer('price');
            $table->string('status')->default('available');
            $table->unsignedBigInteger('floor_id');
            $table->foreign('floor_id')->references('id')->on('floors');
            $table->foreignId('manager_id')->nullable()->constrained("managers")->cascadeOnUpdate()->nullOnDelete();

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
        Schema::dropIfExists('rooms');
    }
}
