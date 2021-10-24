<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addSpecialty extends Model
{
    use HasFactory;
    protected $fillable = [
     'image',
     'alt',
     'name',
     'slug',
     'url',
     'add_college_id',
     'about',
     'keywords',
    ];
    //
    public function addCollege()
    {
        # code...
        return $this->belongsTo(addCollege::class,'add_college_id');
    }
}
