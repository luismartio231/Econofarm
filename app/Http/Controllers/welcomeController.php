<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class welcomeController extends Controller
{
    public function __invoke(){

        $categories = category::all();

        return view('welcome', compact('categories'));
    }

}
