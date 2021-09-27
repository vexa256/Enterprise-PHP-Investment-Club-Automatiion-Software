<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatffDocsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('satff_docs', function (Blueprint $table) {
            $table->id();
            $table->string('DocumentName');
            $table->string('DocURL')->nullable();
            $table->string('DocID')->unique();
            $table->text('Description');
            $table->string('EmpID');
            $table->string('status')->default("true");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('satff_docs');
    }
}
