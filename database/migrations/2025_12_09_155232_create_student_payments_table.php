<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::create('student_payments', function (Blueprint $table) {
       $table->id();
    
        $table->foreignId('student_id')
            ->constrained()
             ->cascadeOnDelete();
    
        $table->unsignedTinyInteger('month');
         $table->unsignedSmallInteger('year');
    
        $table->unsignedInteger('monthly_fee');
        $table->unsignedInteger('paid_amount')->default(0);
        $table->unsignedInteger('due_amount')->default(0);
    
        $table->enum('status', ['Paid', 'Partial', 'Unpaid'])->default('Unpaid');
      
        $table->timestamp('paid_at')->nullable();
        $table->text('note')->nullable();
    
         $table->timestamps();
    
        $table->unique(['student_id', 'month', 'year']);
  });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_payments');
    }
};
