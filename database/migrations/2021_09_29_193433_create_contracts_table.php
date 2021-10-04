<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('CategoryName')->nullable();
            $table->text('Description')->nullable();
            $table->string('CID')->nullable();;
            $table->string('Gender');
            $table->string('ContractorName')->unique();
            $table->string('PhoneNumber')->unique();;
            $table->string('Email')->unique();;
            $table->string('LocalAddress');
            $table->text('OtherContractorDetails');
            $table->string('PermanentAddress');
            $table->string('NIN')->unique();;
            $table->string('IDScan')->nullable();
            $table->string('Nationality');
            $table->date('DOB');
            $table->string('Designation');
            $table->string('Expertise');
            $table->string('Department');
            $table->bigInteger('MonthlySalary');
            $table->string('EmpID')->unique();
            $table->string('StaffCode')->unique()->nullable();
            $table->date('JoiningDate');
            $table->date('ContractExpiry');
            $table->string('BankName');
            $table->string('BankBranch');
            $table->string('AccountName');
            $table->string('AccountNumber')->unique();;
            $table->string('TIN')->nullable()->unique();
            $table->string('BankCode')->nullable();
            $table->string('StaffPhoto')->nullable();
            $table->string('PromotionStatus')->default("false");
            $table->string('RecordStatus')->default("Contract Active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('contracts');
    }
}
