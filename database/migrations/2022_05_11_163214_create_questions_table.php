<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->string('answer')->nullable();
            $table->integer('marks')->default(1);
            $table->integer('order')->default(9999)->nullable();
            $table->string('type')->default('m');
            $table->string('link')->nullable();
            $table->boolean('paid')->default(true);
            $table->text('explanation')->nullable();
            $table->integer('unit_id');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
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
        Schema::dropIfExists('questions');
    }
}
