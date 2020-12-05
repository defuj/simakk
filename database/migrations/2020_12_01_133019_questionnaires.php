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
            $table->mediumText('questionnaire_title');
            $table->text('questionnaire_description');
            $table->enum('questionnaire_status', ['enable', 'disabled'])->default('disabled');
            $table->enum('questionnaire_type', ['draf', 'publish'])->default('draf');
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
        Schema::dropIfExists('questionnaires');
    }
}
