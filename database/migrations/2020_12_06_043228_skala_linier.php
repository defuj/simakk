<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SkalaLinier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skala_linier', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id');
            $table->integer('minimum')->default(1);
            $table->integer('maximum')->default(3);
            $table->string('label_minimum')->nullable();
            $table->string('label_maximum')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_type');
    }
}
