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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->foreignId('owner_id')->constrained('users');
            $table->string('model');
            $table->integer('passenger_seats_available');
            $table->string('vehicle_number');
            $table->string('payment_type'); // e.g., 'per seat', 'per day'
            $table->decimal('amount', 10, 2);
            $table->string('pickup_point'); // 'lat and lng'
            $table->string('img_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
