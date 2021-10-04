<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractorBenefitsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('contractor_benefits', function (Blueprint $table) {
            $table->id();
            $table->string('BID');
            $table->string('Benefit');
            $table->bigInteger('Amount')->nullable();;
            $table->text('Description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('contractor_benefits');
    }
}
