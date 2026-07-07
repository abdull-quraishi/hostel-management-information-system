<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
    $table->id();

    $table->string('name');
    $table->string('father_name')->nullable();
    $table->string('address')->nullable();
    $table->string('contact')->nullable();
    $table->string('taskira')->nullable();
    $table->string('university')->nullable();

    $table->foreignId('floor_id')->constrained()->cascadeOnDelete();
    $table->foreignId('room_id')->constrained()->cascadeOnDelete();

    // 🔑 CURRENT MONTH SNAPSHOT
    $table->unsignedInteger('monthly_fee');
    $table->unsignedInteger('paid_amount')->default(0);
    $table->unsignedInteger('due_amount')->default(0);

    $table->dateTime('admission_date')->format('Y-m-d\TH:i');
    $table->boolean('is_active')->default(true);

    $table->timestamps();
   });

    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
