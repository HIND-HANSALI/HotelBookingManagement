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
        // 'typeBooking',
        // 'totalPrice',
        // 'numberPerson',
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
        return $this->hasOne(Reservationdetail::class);
    }

    public function isAvailable($checkIn, $checkOut, $chambre_id, $numberPerson, $reservation_id = null)
{
    $room = Chambre::with('reservations')->where('id',$chambre_id)->first();
    $available_Rooms_With_reservation = [];
        
        if(count($room->reservations)==0){
            return  1;
        }
        $reservations = Reservation::with('reservationdetails','chambre')->where('chambre_id',$chambre_id)
        ->get();
        $chambres_temp= [];
        $inrange_false = [];
        $out_of_range=0;
        foreach($reservations as $reservation){
            if($reservation && ($reservation->checkOut<$checkIn ||$reservation->checkIn>$checkOut) && $room->numberBedOriginal>=$numberPerson  ){
                // echo "out of range";
                $out_of_range++;
            }elseif($reservation && (($reservation->chambre->numberBedOriginal ?? 0) - ($reservation->reservationdetails->numberPerson ?? 0)) >= $numberPerson){
                if(!in_array($reservation->chambre,$chambres_temp) && !in_array($reservation->chambre,$inrange_false)){
                    // echo "inrange true";
                    array_push($chambres_temp,$reservation->chambre);
                }else{
                    // echo "inrange true but another is false ";
                }
            }
            else{
                echo "in range condition false";
                echo(count($chambres_temp));
                array_push($inrange_false,$reservation->chambre);
                $chambres_temp =  array_diff($chambres_temp, [$reservation->chambre]);
                echo(count($chambres_temp));
                echo '--------------------------------------- <br>';
               
            }
        }
        if($out_of_range==count($reservations)){
            return 1;
        }
        foreach($available_Rooms_With_reservation as $room){
            $in = false;
            foreach($room->reservations as $reservation){
                if(($reservation->checkOut<$checkIn ||$reservation->checkIn>$checkOut) && $room->numberBedOriginal>=$numberPerson){
                    // out of range
                }else{
                    $in = true;
                }
            }
            if($in && $room->numberBedOriginal<=$numberPerson){
                $available_Rooms_With_reservation =  array_diff($available_Rooms_With_reservation, [$room]);
            }
        }
        $roome = array_merge($available_Rooms_With_reservation, $chambres_temp);
        if(count($roome)>0){

            return 1;
        }
        else{
            // dd();
            return 0;
        }
   
       
    
   
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
