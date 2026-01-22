<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function list(Request $request) {
        return view('section');
    } 
}
