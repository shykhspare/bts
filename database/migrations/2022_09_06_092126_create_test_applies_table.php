<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_applies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('test_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            // date
            $table->date('date');
            // transaction id
            $table->string('transaction_id')->nullable();
            // payment status
            $table->string('payment_status')->nullable();
            // test random code
            $table->string('test_code')->nullable();
            // name
            $table->string('name');
            // email
            $table->string('email');
            // phone
            $table->string('phone'); 
            // cnic
            $table->string('cnic');
            // address
            $table->string('address');
            // message
            $table->text('message')->nullable();
            // province
            $table->string('province')->nullable();
            // district
            $table->string('district')->nullable();
            // tehsil
            $table->string('tehsil')->nullable();
            // test password
            $table->string('test_password')->nullable();
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
        Schema::dropIfExists('test_applies');
    }
}
