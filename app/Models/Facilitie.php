<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilitie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'iconF'
        
        
    ];
    public function chambres(){
        return $this->belongsToMany(Chambre::class,'chambre_facilities', 'facility_id', 'chambre_id');
    }
}
