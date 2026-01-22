<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function read(Request $request) {
        return view('article');
    } 
}
