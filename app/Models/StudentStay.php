<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentStay extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'month',
        'year',
        'is_present',
        'paid_amount',
        'due_amount',
        'note',
    ];

    protected $casts = [
        'month' => 'integer',
        'year' => 'integer', 
        'is_present' => 'boolean',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
