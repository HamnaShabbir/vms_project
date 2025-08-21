<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();

            // Host info

            $table->foreignId('host_id')->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('visitor_id')->nullable();
            $table->foreign('visitor_id')->references('id')->on('companies')->onDelete('set null');
            $table->foreignId('host_company_id')->nullable()->constrained('companies')->onDelete('set null');
            $table->foreignId('host_department_id')->nullable()->constrained('departments')->onDelete('set null');
            $table->foreignId('host_designation_id')->nullable()->constrained('designations')->onDelete('set null');
            $table->string('phone_ext')->nullable();

            // Visitor info
            $table->string('name');
            $table->unsignedBigInteger('visitor_company_id')->nullable();
            $table->foreign('visitor_company_id')->references('id')->on('companies')->onDelete('set null');

            $table->foreignId('visitor_designation_id')->nullable()->constrained('designations')->onDelete('set null');
            $table->string('reason')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->string('phone')->nullable();
            $table->enum('id_type', ['CNIC', 'Passport', 'Other'])->nullable();
            $table->string('id_number')->nullable();
            $table->string('id_card_image')->nullable();
            $table->string('visitor_photo')->nullable();

            // Visit details
            $table->date('date_of_visit')->nullable();
            $table->date('date_of_exit')->nullable();
            $table->time('time_of_arrival')->nullable();
            $table->time('time_of_departure')->nullable();
            $table->enum('entry_pass_issued', ['Yes', 'No'])->nullable();
            $table->enum('is_escorted', ['Yes', 'No'])->nullable();
            $table->string('badge_number')->nullable();
            $table->string('escorted_name')->nullable();

            // Parking info
            $table->string('vehicle_plate_no')->nullable();
            $table->foreignId('parking_slot_id')->nullable()->constrained('parking_slots')->onDelete('set null');
            $table->enum('is_parking', ['Yes', 'No']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('visitors');
    }
};
