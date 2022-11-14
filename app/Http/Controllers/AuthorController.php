<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;


class AuthorController extends Controller
{
  public function index()
  {
    $items = Author::all();
    dd($items);
    return view('index', ['items' => $items]);
    }

  public function find()
  {
    return view('find', ['input' => '']);
  }

  public function search(Request $request)
  {
    $author = Author::find($request->input);
    $param = [
      'author' => $author,
      'input' => $request->input
    ];
    return view('find', $param);
  }

  public function add()
  {
    return view('add');
  }

  public function create(AuthorRequest $request)
  {
    $form = $request->all();
    Author::create($form);
    return redirect('/');
  }
  // 追記：ここから
  public function edit(Request $request)
  {
    $author = Author::find($request->id);
    return view('edit', ['form' => $author]);
  }

  public function update(AuthorRequest $request)
  {
    $form = $request->all();
    unset($form['_token']);
    Author::where('id', $request->id)->update($form);
    return redirect('/');
  }
  public function delete(Request $request)
  {
    $author = Author::find($request->id);
    return view('delete',['form' => $author]);
  }

  public function remove(Request $request)
  {
    Author::find($request->id)->delete();
    return redirect('/');
  }

}