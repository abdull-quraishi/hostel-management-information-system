<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

  class Floor extends Model {

      protected $fillable = ['name'];
      public function rooms() { 
        return $this->hasMany(Room::class); 
    }
    
      public function students() { 

        return $this->hasMany(Student::class);
    
    }

  }
  
