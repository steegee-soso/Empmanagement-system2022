<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminmodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminmodels', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string("username")->uniqid();
            $table->string("password", 155)->nullable();
            $table->integer("status")->default(0);
            $table->string('role_id')->nullable()->default(1);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adminmodels');
    }
}
