<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_service', function (Blueprint $table) {
            $table->foreignId('booking_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->id();
            $table->timestamps();
            $table->decimal('price',8,2)->nullable();


        });
 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
