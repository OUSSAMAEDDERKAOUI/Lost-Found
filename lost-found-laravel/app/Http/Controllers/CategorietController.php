<?php

namespace App\Http\Controllers;
use App\Models\category;

use Illuminate\Http\Request;

class CategorietController extends Controller
{
public function showCategories(){

    
        $categories = Category::all(); 
        return view('home', ['categories' => $categories]); 
    }
}
