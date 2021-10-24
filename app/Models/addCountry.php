<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addCountry extends Model
{
    use HasFactory;
    //
    protected $fillable = ['name','slug'];
    //
    public function addCitys()
    {
        # code...
        return $this->hasMany(addCity::class);
    }
    //
    public function addUniversitys()
    {
        # code...
        return $this->hasMany(addUniversity::class);
        
    }
    
}
