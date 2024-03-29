<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_client', function (Blueprint $table) {
            $table->id();
            $table->date('weekOf');
            $table->string('pdf_title')->default('default.pdf');
            $table->enum('lead_source', ['Telemarketer', 'BDM', 'Self-generated']);
            $table->foreignId('client_id');
            $table->foreignId('audit_id');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('audit_id')->references('id')->on('audits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audit_client');
    }
}
