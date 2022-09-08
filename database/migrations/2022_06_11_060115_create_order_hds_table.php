<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderHdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_hds', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->nullable();
            $table->string('orderNo')->nullable();
            $table->unsignedBigInteger('user_id')->default(0);
            $table->boolean('paid')->default(false);
            $table->string('name');
            $table->string('status')->nullable();
            $table->string('email');
            $table->string('phoneno');
            $table->string('address');
            $table->string('company')->nullable();
            $table->integer('price')->default(0);
            $table->softDeletes();
            $table->timestamp('expired_at')->nullable();
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
        Schema::dropIfExists('order_hds');
    }
}
