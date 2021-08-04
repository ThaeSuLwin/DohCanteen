<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_type_id');
            $table->foreignId('canteen_info_id');
            $table->string('name');
            
            $table->string('email')->nullable();
            $table->text('phone_number')->nullable();
            $table->string('nationality_number')->nullable();
            $table->foreignId('gender_id')->nullable();
            $table->text('address')->nullable();
            
            $table->integer('salary')->nullable();
            $table->longText('about_you')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
