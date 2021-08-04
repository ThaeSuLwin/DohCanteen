<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCanteenInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canteen_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('canteen_owner_id');
            $table->string('name');
            $table->string('address');
            $table->string('phone_number');
            $table->string('email');
            $table->longText('description');
            $table->string('image');
            $table->softDeletes();
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
        Schema::dropIfExists('canteen_infos');
    }
}
