<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffbenefitsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('staffbenefits', function (Blueprint $table) {
            $table->id();
            $table->string('EmpID');
            $table->string('Benefit');
            $table->text('Description');
            $table->bigInteger('Amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('staffbenefits');
    }
}
