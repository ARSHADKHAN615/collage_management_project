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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->date('student_dob');
            $table->date('admission_date');
            $table->string('student_email');
            $table->string('student_phone');
            $table->string('student_address');
            $table->string('student_city');
            $table->string('student_state');
            $table->string('student_zip');
            $table->bigInteger('roll_no');
            $table->string('year_of_study');
            $table->string('student_image')->nullable();
            $table->boolean('paid_status')->default(false);
            $table->decimal('paid_fees')->default('0');
            $table->foreignId('course_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('students');
    }
};
