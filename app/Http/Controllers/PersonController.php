<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use Laravel\Ui\Presets\React;

class PersonController extends Controller
{
  public function index(Request $request)
  {
    $items = Person::all();
    return view('person.index', ['items' => $items]);
  }

  //新規作成・表示
  public function add(Request $request) {
    return view('person.add');
  }

  // 新規作成・保存処理
  public function create(Request $request) {
    $this->validate($request, Person::$rules);
    $person = new Person;
    $form = $request->all();
    unset($form['_token']);
    $person->fill($form)->save();
    return redirect('/person');
  }

  //編集画面・表示
  public function edit(Request $request) {
    $person = Person::find($request->id);
    return view('person.edit', ['form'=> $person]);
  }
  //編集の更新処理
  public function update(Request $request) {
    $this->validate($request, Person::$rules);
    $person = Person::find($request->id);
    $form = $request->all();
    unset($form['_token']);
    $person->fill($form)->save();
    return redirect('/person');
  }

  //削除画面の表示
  public function delete(Request $request) {
    $item = Person::find($request->id);
    return view('person/delete', ['form' => $item]);
  }

  //削除の処理
  public function remove(Request $request) {
    Person::find($request->id)->delete();
    return redirect('/person');
  }

  public function find(Request $request)
  {
    return view('person.find', ['input' => '']);
  }

  // idで一つ検索する
  // public function search(Request $request) {
  //   $item = Person::find($request->input);
  //   $param = ['input' => $request->input, 'item' => $item];
  //   return view('person.find', $param);
  // }

  // 名前で完全一致検索
  // public function search(Request $request) {
  //   $item = Person::where('name', $request->input)->first();
  //   $param = ['input' => $request->input, 'item'=>$item];
  //   return view('person.find', $param);
  // }

  // ローカルスコープで完全一致検索する場合
  // public function search(Request $request) {
  //   $item = Person::nameEqual($request->input)->first();
  //   $param = ['input' => $request->input, 'item'=>$item];
  //   return view('person.find', $param);
  // }


  // public function search(Request $request)
  // {
  //   $min = $request->input * 1;
  //   $max = $min + 10;
  //   $item = Person::ageGreateThan($min)->ageLessThan($max)->get();
  //   $param = ['input' => $request->input, 'item' => $item];
  //   return view('person.find', $param);
  // }




}
