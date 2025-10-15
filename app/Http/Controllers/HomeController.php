<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Games;

class HomeController extends Controller
{
    public function index()
    {
        $books = Games::all();
        return view('home', compact('games'));
    }
}