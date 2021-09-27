<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeductionsLogsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('deductions_logs', function (Blueprint $table) {
            $table->id();
            $table->string('Deduction');
            $table->text('Description');
            $table->bigInteger('Amount');
            $table->string('DID');
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
        Schema::dropIfExists('deductions_logs');
    }
}
