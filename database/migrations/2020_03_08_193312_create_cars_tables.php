<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('label')->nullable();
            // $table->boolean("status")->default(1);
            $table->timestamps();
        });

        Schema::create('car_user', function (Blueprint $table) {
            $table->primary(['user_id', 'car_id']);

            $table->unsignedBigInteger('user_id'); // we need user_id in the question
            $table->unsignedBigInteger('car_id'); // and car_ id response to it

            $table->year('year')->nullable();
            $table->integer('km')->nullable();
            $table->string('licence_plate')->nullable();
            $table->boolean("status")->default(1);


            $table->timestamps();

            $table->foreign('user_id')  // It
            ->references('id')  // reference to id column
            ->on('users') // on user tables
            ->onDelete('cascade');

            $table->foreign('car_id')
                ->references('id')
                ->on('cars')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            //
        });
    }
}
