<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorsAssignsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('supervisors_assigns', function (Blueprint $table) {
            $table->id();
            $table->string('SupervisorEmpID');
            $table->string('StaffMemberEmpID');
            $table->string('StaffMember');
            $table->string('StaffMemberDepartment');
            $table->string('Supervisor');
            $table->string('SupervisorDepartment');
            $table->string('StaffMemberDesignation');
            $table->string('StaffMemberCode');
            $table->string('SupervisorDesignation');
            $table->string('AssignID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('supervisors_assigns');
    }
}
