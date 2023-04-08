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

    public function reservationdetails()
    {
        return $this->hasMany(Reservationdetail::class);
    }

    public function isAvailable($checkIn, $checkOut, $chambre_id, $numberPerson, $reservation_id = null)
{
    $count = $this->join('reservationdetails', 'reservations.id', '=', 'reservationdetails.reservation_id')
        ->where('reservations.chambre_id', $chambre_id)
        ->where('reservations.statutBooking', 'booked')
        ->where(function ($query) use ($checkIn, $checkOut, $reservation_id) {
            $query->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('reservations.checkIn', [$checkIn, $checkOut])
                    ->orWhereBetween('reservations.checkOut', [$checkIn, $checkOut]);
            })
            ->orWhere(function ($query) use ($checkIn, $checkOut, $reservation_id) {
                $query->where('reservations.checkIn', '<', $checkIn)
                    ->where('reservations.checkOut', '>', $checkOut);
            })
            ->when($reservation_id, function ($query, $reservation_id) {
                $query->where('reservations.id', '<>', $reservation_id);
            });
        })
        ->sum('reservationdetails.numberPerson');

        $numberBedOriginal = Chambre::findOrFail($chambre_id)->numberBedOriginal;
        $availableBeds = Chambre::findOrFail($chambre_id)->numberBed;
    
        // Check if the available number of beds is less than the required number of beds
        if ($availableBeds > $numberPerson) {
            return 0;
        }
    
        // Check if the number of beds that will be occupied by all reservations in the given period
        // exceeds the number of beds available for the room
        if ($numberBedOriginal - $count > $numberPerson) {
            return 0;
        }
        
        // If the room is available for the selected dates and has enough beds for the reservation
        return $availableBeds - $count;
       
    
   
}


    // public function isAvailable($checkIn, $checkOut, $chambre_id)
    // {
    // $reservations = $this->where('chambre_id', $chambre_id)
    //                         ->whereBetween('checkIn', [$checkIn, $checkOut])
    //                         ->orWhereBetween('checkOut', [$checkIn, $checkOut])
    //                         ->get();
    //     return $reservations->isEmpty();
    // }
}
