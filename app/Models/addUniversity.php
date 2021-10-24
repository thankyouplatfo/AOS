<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addUniversity extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'alt',
        'name',
        'slug',
        'add_countrie_id',
        'add_citie_id',
        'type',
        'internationalRanking',
        'localRanking',
        'url',
        'about',
        'keywords'
    ];
    //
    public function addCountry()
    {
        # code...
        return $this->belongsTo(addCountry::class,'add_countrie_id');
    }
    //
    public function addCity()
    {
        # code...
        return $this->belongsTo(addCity::class,'add_citie_id');
    }
}
