<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractorBeneficiariesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('contractor_beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string('BID');
            $table->string('EmpID');
            $table->string('Name');
            $table->string('PhoneNumber');
            $table->string('Email');
            $table->bigInteger('Age');
            $table->string('Gender');
            $table->date('DOB');
            $table->string('CurrentAddress');
            $table->string('PermanentAddress');
            $table->string('Relationship');
            $table->string('IdType');
            $table->string('IdNumber');
            $table->string('IDScan')->nullable();
            $table->string('Photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('contractor_beneficiaries');
    }
}
