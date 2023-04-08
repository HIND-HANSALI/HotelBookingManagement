<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservationdetail extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
//     public function getNumberBed($chambre_id)
// {
// return DB::table('chambres')
//             ->select('numberBed')
//             ->where('id', $chambre_id)
//             ->value('numberBed');
// }

}
