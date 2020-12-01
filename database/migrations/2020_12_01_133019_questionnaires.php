<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Questionnaires extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->id('questionnaire_id');
            $table->string('questionnaire_title');
            $table->string('questionnaire_description');
            $table->string('questionnaire_status');
            $table->string('questionnaire_type');
            $table->dateTime('questionnaire_created_at',0);
            $table->string('google_id')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionnaires');
    }
}
