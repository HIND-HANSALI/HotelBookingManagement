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
        // 'statutBooking',
        'typeBooking',
        'totalPrice',
        'numberPerson',
        'chambre_id',
        'user_id',
        
        
    ];

    public function chambre()
    {
        return $this->belongsTo(Chambre::class, 'chambre_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
