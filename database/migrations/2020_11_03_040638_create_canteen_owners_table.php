<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCanteenOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canteen_owners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('license');
            $table->string('nationality_number');
            $table->string('phone_number_one');
            $table->string('phone_number_two');
            $table->text('address');
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
        Schema::dropIfExists('canteen_owners');
    }
}
