<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeptHeadsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('dept_heads', function (Blueprint $table) {
            $table->id();
            $table->string('EmployeeName');
            $table->string('EmpID')->nullable();
            $table->string('Department');
            $table->string('ReportsTo');
            $table->text('JobDescription');
            $table->text('status')->default("active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('dept_heads');
    }
}
