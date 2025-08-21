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
            $table->date('Date_of_Visit')->nullable();
            $table->time('Time_of_Arrival')->nullable();
            $table->time('Time_of_Departure')->nullable();
            $table->text('Items_Carried')->nullable();
            $table->string('Badge_Number')->nullable();
            $table->boolean('Escorted')->default(0);
            $table->string('Escorted_Name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visitors', function (Blueprint $table) {
            $table->dropColumn(['Date_of_Visit', 'Time_of_Arrival', 'Time_of_Departure', 'Items_Carried', 'Badge_Number', 'Escorted', 'Escorted_Name']);
        });
    }
};
