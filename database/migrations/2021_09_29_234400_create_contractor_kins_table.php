<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractorKinsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('contractor_kins', function (Blueprint $table) {
            $table->id();
            $table->string('EmployeeName');
            $table->string('EmpID');
            $table->string('Name');
            $table->string('Relationship');
            $table->string('Nationality');
            $table->string('IdNo');
            $table->string('Gender');
            $table->date('DOB');
            $table->string('PhoneNumber');
            $table->string('CurrentAddress');
            $table->string('PermanentAddress');
            $table->string('Email')->default("NA");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('contractor_kins');
    }
}
