<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeductionsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('deductions', function (Blueprint $table) {
            $table->id();
            $table->string('Deduction')->unique();
            $table->text('Description');
            $table->bigInteger('Amount');
            $table->string('DID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('deductions');
    }
}
