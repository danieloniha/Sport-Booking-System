<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class AppController extends Controller
{
    
    public function display(){
        $books = Books::with(['sport', 'field'])->get();
        //dd($books->first()->sport);
        return view('admin.index', compact('books'));
    }
}
