<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CMSHomePageBgHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        return view('welcome'/**, ['items' => Category::latest()->id()->get()] */);
    }
}
