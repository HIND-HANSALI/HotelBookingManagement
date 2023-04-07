<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameR',
        'descriptionR',
        'categorie_id',
        'statutR',
       
        'numberBed',
        'priceR',

        // 'pictureR',
        // 'facility_id',
    
    ];
    public function facilities(){
        return $this->belongsToMany(Facilitie::class,'chambre_facilities', 'chambre_id', 'facility_id');
    }

    public function chambreimages()
    {
        return $this->hasMany(Chambreimage::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    // public function getNumberBed($chambre_id)
    // {
    //     return DB::table('chambres')
    //             ->select('numberBed')
    //             ->where('id', $chambre_id)
    //             ->value('numberBed');
    // }

}
