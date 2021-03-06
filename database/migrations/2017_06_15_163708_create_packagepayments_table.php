<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagepaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packagepayments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userpackage_id')->unsigned();
            $table->bigInteger('price');
            $table->date('start_periode');
            $table->date('end_periode');
            $table->enum('status',['approved','not_approved'])->default('not_approved');
            $table->string('image')->nullable();
            $table->timestamps();
        });
        Schema::table('packagepayments', function (Blueprint $table){
          $table->foreign('userpackage_id')->references('id')->on('userpackages')->ononDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packagepayments');
    }
}
