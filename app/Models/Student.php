<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'father_name',
        'address',
        'contact',
        'taskira',
        'university',
        'floor_id',
        'room_id',

        // current month 
        'monthly_fee',
        'paid_amount',
        'due_amount',

        'admission_date',
        'is_active',
    ];

    protected $casts = [
        'admission_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    /* ================= Relations ================= */

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function payments()
    {
        return $this->hasMany(StudentPayment::class);
    }

    public function stays()
    {
        return $this->hasMany(StudentStay::class);
    }

    /* ================= Helpers ================= */

    // total paid (all months)
    public function totalPaid()
    {
        return $this->payments()->sum('paid_amount');
    }

    // total due (all months)
    public function totalDue()
    {
        return $this->payments()->sum('due_amount');
    }

    // total months stayed
    public function totalMonths()
    {
        return $this->stays()->count();
    }
}
