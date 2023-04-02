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
        'pictureR',
        'numberBed',
        'priceR',


        // 'facility_id',
    
    ];
    public function facilities(){
        return $this->belongsToMany(Facilitie::class,'chambre_facilities', 'chambre_id', 'facility_id');
    }

}
