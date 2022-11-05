<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('employee_id');
            $table->date('date_start');
            $table->date('date_end');
            $table->smallInteger('nodays');
            $table->unsignedInteger('leave_type');
            $table->longText('reason')->nullable();
            $table->string('status');
            $table->longText('remarks')->nullable();
            $table->date('date_posted');
            $table->date('action_date')->nullable();
            $table->smallInteger('total');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('leave_type')->references('id')->on('leave_types')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
};
