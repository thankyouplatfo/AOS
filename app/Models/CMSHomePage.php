<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CMSHomePage extends Model
{
    use HasFactory;
    protected $fillable = [
       'headerImage',
       'altHeaderImage',
       'about',
       'keywords',
       'address',
       'tel',
       'email',
       'mapImage',
       'altMapImage',
       'whatsAppID',
    ];
}
