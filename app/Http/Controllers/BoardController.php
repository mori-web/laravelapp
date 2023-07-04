<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardController extends Controller
{
  // 一覧画面の表示
  public function index(Request $request)
  {
    // $items = Board::all();
    $items = Board::with('person')->get();
    // dd($items);
    return view('board.index', ['items' => $items]);
  }

  //新規画面の表示
  public function add(Request $request)
  {
    return view('board.add');
  }

  //新規画面の保存
  public function create(Request $request)
  {
    $this->validate($request, Board::$rules);
    $board = new Board;
    $form = $request->all();
    unset($form['_token']);
    $board->fill($form)->save();
    return redirect('/board');
  }
}
