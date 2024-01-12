<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('employee_id');
            $table->string('national_id');

            //personal details 
            $table->string('driving_license');
            $table->date('license_expiry');
            $table->string('snn');
            $table->string('sin');
            $table->string('military_service');
            $table->string('nationality');
            $table->string('marital_status');
            $table->string('gender');
            $table->string('blood_type');

            //contact Details 
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('country_code');
            $table->string('phone_number');
            $table->string('email');

            //job details
            $table->date('joined_date');
            $table->string('job_title');
            $table->string('job_categories');
            $table->string('sub_unit');
            $table->string('employment_status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
