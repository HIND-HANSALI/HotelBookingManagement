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

    public function isAvailable($checkIn, $checkOut, $chambre_id,$numberPerson)
    {

    $room = Chambre::findOrFail($chambre_id);
    $count = $this->where('chambre_id', $chambre_id)
                  ->where(function ($query) use ($checkIn, $checkOut) {
                      $query->whereBetween('checkIn', [$checkIn, $checkOut])
                            ->orWhereBetween('checkOut', [$checkIn, $checkOut])
                            ->orWhere(function ($query) use ($checkIn, $checkOut) {
                                $query->where('checkIn', '<', $checkIn)
                                      ->where('checkOut', '>', $checkOut);
                            });
                  })
                  ->whereHas('reservationdetails', function($query) use ($numberPerson) {
                    $query->where('numberPerson', '<=', $numberPerson);
                })
                
                // ->whereHas('chambre', function ($query) use ($numberPerson) {
                //     $query->where('numberBed', '>=', $numberPerson);
                // })
                
                  ->count();
                  $room = Chambre::find($chambre_id);
                  if ($numberPerson > $room->numberBed) {
                      return "The selected room does not have enough beds for the number of persons entered.";
                  }

    return $count ;
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
