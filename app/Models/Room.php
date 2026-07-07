<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

  class Room extends Model {

      protected $fillable = ['floor_id','room_number','capacity','current_students'];
      
      public function floor() {
         return $this->belongsTo(Floor::class); 
        }

      public function students() {
         return $this->hasMany(Student::class); 
        }

  }
  
