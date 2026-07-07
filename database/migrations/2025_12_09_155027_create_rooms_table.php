<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
  {
    // database/migrations/xxxx_create_rooms_table.php
    Schema::create('rooms', function (Blueprint $table) {
        $table->id();
        $table->foreignId('floor_id')->constrained('floors')->cascadeOnDelete();  
        $table->string('room_number');   
        $table->unsignedInteger('capacity');
        $table->unsignedInteger('current_students')->default(0);
        $table->timestamps();
    });
 
   }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
