<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AnswersContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers_content', function (Blueprint $table) {
            $table->id();
            $table->string('answers_id')->index();
            $table->string('questionnaire_id')->index();
            $table->foreignId('question_id');
            $table->string('question_type');
            $table->text('answer')->nullable();
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
        //
    }
}
