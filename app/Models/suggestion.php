<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suggestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'room_no',
        'suggestion',
    ];
}
