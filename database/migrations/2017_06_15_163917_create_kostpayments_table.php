<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKostpaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kostpayments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rental_id')->unsigned();
            $table->char('month',2);
            $table->char('year',4);
            $table->float('price',8,2);
            $table->enum('status',['approved','not_approved'])->default('not_approved');
            $table->timestamps();
        });
        Schema::table('kostpayments', function (Blueprint $table){
          $table->foreign('rental_id')->references('id')->on('rentals')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kostpayments');
    }
}
