<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addMember extends Model
{
    use HasFactory;
    protected $fillable = [
       'image',
       'alt',
       'name',
       'slug',
       'about',
       'keywords',
       'email',
       'tel',
       'add_role_id',
       'facebookAccount',
       'twitterAccount',
       'instagramAccount',
    ];
    //
    public function addRole()
    {
        # code...
        return $this->belongsTo(addRole::class,'add_role_id');
    }
}
