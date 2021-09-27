<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenefitsLogsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('benefits_logs', function (Blueprint $table) {
            $table->id();
            $table->string('Benefit');
            $table->text('Description');
            $table->bigInteger('Amount');
            $table->string('BID');
            $table->string('PayID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('benefits_logs');
    }
}
