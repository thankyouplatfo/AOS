<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addRole extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug'];
    //
    public function addMembers()
    {
        # code...
        return $this->hasMany(addMember::class);
    }
}
