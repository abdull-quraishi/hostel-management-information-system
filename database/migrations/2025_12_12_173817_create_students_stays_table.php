<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
          Schema::create('student_stays', function (Blueprint $table) {
            $table->id();
        
            $table->foreignId('student_id')
                ->constrained()
                ->cascadeOnDelete();
        
            $table->unsignedTinyInteger('month');
            $table->unsignedSmallInteger('year');
        
            // 🔑 same naming as payments
            $table->unsignedInteger('paid_amount')->default(0);
            $table->unsignedInteger('due_amount')->default(0);
        
            $table->boolean('is_present')->default(true);
            $table->text('note')->nullable();
        
            $table->timestamps();
        
            $table->unique(['student_id', 'month', 'year']);
  });
  
    }

    public function down(): void
    {
        Schema::dropIfExists('student_stays');
    }
};
