<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function read(Request $request) {

        return view('recipe');
    } 
}
