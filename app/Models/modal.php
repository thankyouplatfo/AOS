<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modal extends Model
{
    use HasFactory;
    protected $fillable = [
        'openClose',
        'title',
        'image',
        'describe',
        'startDate',
        'expiryDate',
    ];
}
