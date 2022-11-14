<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
  public function index()
  {
    $items = Author::all();
    dd(items);
    return view('index', ['items' => $items]);
  }
}