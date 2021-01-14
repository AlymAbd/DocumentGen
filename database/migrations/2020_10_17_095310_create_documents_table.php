<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('number', 255);
            $table->string('company_name', 255);
            $table->string('legal_name', 255);
            $table->string('director', 255);
            $table->string('signature', 255);
            $table->string('bin', 255);
            $table->integer('legal_type');
            $table->integer('document');
            $table->boolean('is_deleted')->default(false);
            $table->boolean('pdf_ready')->default(false);
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
        Schema::dropIfExists('documents');
    }
}
