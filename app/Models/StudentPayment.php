<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'month',
        'year',
        'monthly_fee',
        'paid_amount',
        'due_amount',
        'status',
        'paid_at',
        'note',
    ];

    protected $casts = [
        'month' => 'integer',
        'year' => 'integer',
        'paid_at' => 'datetime',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
