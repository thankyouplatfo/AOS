<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addCity extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','add_countrie_id'];
    //
    public function addCountry()
    {
        # code...
        return $this->belongsTo(addCountry::class, 'add_countrie_id');
    }
    //
    public function addUniversitys()
    {
        # code...
        return $this->hasMany(addUniversity::class);
        
    }
    
}
