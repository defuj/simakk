<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Questions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id('question_id');
            $table->string('questionnaire_id')->index();
            $table->text('question_content')->nullable();
            $table->enum('question_type', ['Pilihan Ganda','Skala Linier','Jawaban Singkat'])->default('Skala Linier');
            $table->tinyInteger('question_index')->nullable();
            $table->boolean('question_require')->default(false);
            $table->timestamps(0);
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
