<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->string('EmpID');
            $table->string('Month');
            $table->string('Year');
            $table->text('Description')->default("NA");
            $table->bigInteger('Taxes');
            $table->bigInteger('Deduction');
            $table->bigInteger('Benefits');
            $table->bigInteger('SalaryPaid');
            $table->bigInteger('GrossSalary');
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
        Schema::dropIfExists('payrolls');
    }
}
