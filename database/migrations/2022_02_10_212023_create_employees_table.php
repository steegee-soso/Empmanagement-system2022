<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('role_id')->nullable();
            $table->integer('department_id');
            $table->string('dob')->nullable();
            $table->string('job_title')->nullable();
            $table->string('job_description')->nullable();
            $table->string('email', 155)->uniqid();
            $table->string('phone_number', 30)->uniqid();
            $table->string('image')->nullable();
            $table->string('status', 20)->default('inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
