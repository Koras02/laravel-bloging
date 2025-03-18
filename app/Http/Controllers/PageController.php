<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        // 동적 데이터 
        $title = "Welcome to Koras02 Page!";
        $description = "This is a dynamic web Page using Laravel Blade.";

        return view("home", compact("title", "description"));
    }
}
