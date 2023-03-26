<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'checkIn',
        'checkOut',
        'statutBooking',
        'typeBooking',
        'totalPrice',
        'numberPerson',
        'room_id',
        'user_id',
        
        
    ];
}
