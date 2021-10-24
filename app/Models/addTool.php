<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addTool extends Model
{
    use HasFactory;
    protected $fillable = ['name','url','about','add_category_tool_id'];
    //
    public function addCategoryTool()
    {
        # code...
        return $this->belongsTo(addCategoryTool::class,'add_category_tool_id');
    }
}
