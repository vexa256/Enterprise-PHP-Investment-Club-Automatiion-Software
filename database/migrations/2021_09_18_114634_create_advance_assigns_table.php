<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvanceAssignsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('advance_assigns', function (Blueprint $table) {
            $table->id();
            $table->string('EmpID');
            $table->string('AdvanceID');
            $table->string('IssueDate');
            $table->string('Month');
            $table->string('Year');
            $table->bigInteger('MonthlyDeduction');
            $table->bigInteger('AdvanceAmount');
            $table->text('Description');
            $table->string('DeductStatus')->default('deduct');
            $table->string('ApprovalStatus')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('advance_assigns');
    }
}
