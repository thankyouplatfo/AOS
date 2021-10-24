<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addCollege extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'alt',
        'name',
        'slug',
        'type',
        'url',
        'add_universitie_id',
        'about',
        'keywords',
    ];
    //
    public function addUniversity()
    {
        # code...
        return $this->belongsTo(addUniversity::class,'add_universitie_id');
    }
    //
    public function addSpecialtys()
    {
        # code...
        return $this->hasMany(addSpecialty::class);
    }

}
