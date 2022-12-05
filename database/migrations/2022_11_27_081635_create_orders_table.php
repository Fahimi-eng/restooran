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

            $table->unsignedBigInteger('table_id');
            $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade');

            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')->references('id')->on('food')->onDelete('cascade');

            $table->string('customer');
            $table->string('date');
            $table->enum('meal',['dinner' , 'lunch']);
            $table->string('phone');
            $table->enum('time',['11:00','11:30','12:00','12:30','13:00','13:30','19:00','19:30','20:00','20:30','21:00','21:30']);
            $table->string('guests');
            $table->enum('status',['failed','done','inProcess'])->default('inProcess');
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
