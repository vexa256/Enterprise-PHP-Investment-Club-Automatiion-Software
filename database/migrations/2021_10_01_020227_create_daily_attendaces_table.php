<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyAttendacesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('daily_attendaces', function (Blueprint $table) {
            $table->id();
            $table->string('RID');
            $table->string('EmpID');
            $table->string('Name');
            $table->string('Department');
            $table->string('Designation');
            $table->string('status');
            $table->string('App_1');
            $table->string('App_2');
            $table->string('App_3');
            $table->string('App_1_RoleID');
            $table->string('App_2_RoleID');
            $table->string('App_3_RoleID');
            $table->string('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('daily_attendaces');
    }
}
