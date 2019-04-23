<?php

namespace App\Http\Controllers;

use App\Category;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $locations = Location::all();
            $categories = Category::all();
            return view('location.index', compact('locations' , 'categories'));
        }
        else {
            return view('home.login');
        }
    }
}
