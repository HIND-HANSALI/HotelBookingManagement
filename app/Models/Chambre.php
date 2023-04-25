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
        'numberBedOriginal',

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
    public function ReviewData()
    {
    return $this->hasMany('App\Models\ReviewRating','chambre_id');
    }
    
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

}
