<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'hostel_location',
        'supervisor',
      ];

      public function location_supervisor()
      {
          return $this->belongsTo(User::class, 'supervisor', 'id');
      }
}
