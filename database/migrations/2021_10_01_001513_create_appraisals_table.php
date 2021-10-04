<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppraisalsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('appraisals', function (Blueprint $table) {
            $table->id();
            $table->string('EmpID');
            $table->string('Name');
            $table->string('Department');
            $table->string('Designation');
            $table->string('AID');
            $table->string('Month');
            $table->string('Year');
            $table->string('Title');
            $table->bigInteger('Score');
            $table->text('KpiAnalysis');
            $table->text('Recommendations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('appraisals');
    }
}
