<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('visitors', function (Blueprint $table) {
            $table->string('vehicle_plate_no')->after('id'); // Vehicle plate number column
            $table->enum('is_parking', ['Yes', 'No'])->after('vehicle_plate_no'); // Parking status ENUM
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visitors', function (Blueprint $table) {
            $table->dropColumn(['vehicle_plate_no', 'is_parking']);
        });
    }
};
