<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Room extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'location',
        'room_no',
        'price',
        'description',
        'occupant',
        'dues',
    ]; 

    public function user_room()
        {
            return $this->belongsTo(User::class, 'occupant', 'id');
        }
    
}
