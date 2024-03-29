<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->json('sa');
            $table->string('survey_pdf');
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->boolean('is_cancelled')->default(0);
            $table->foreignId('adviser_id');
            $table->foreignId('client_id');

            $table->timestamps();
            $table->foreign('adviser_id')->references('id')->on('advisers');
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surveys');
    }
}
