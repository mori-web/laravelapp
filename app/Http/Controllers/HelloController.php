<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use Illuminate\Support\Facades\Auth;

class HelloController extends Controller
{
  public function index(Request $request)
  {
    // $sort = $request->sort;
    // $items = Person::orderBy($sort,'asc')->simplePaginate(3);
    // $param = ['items' => $items, 'sort'=> $sort];
    // return view('hello.index',$param);
    
    // ユーザー認証
    $user = Auth::user();
    $sort = $request->sort;
    $items = Person::orderBy($sort,'asc')->paginate(3);
    $param = ['items' => $items, 'sort'=> $sort, 'user' => $user];
    return view('hello.index',$param);
    
  }

  public function getAuth(Request $request) {
    $param = ['message' => 'ログインして下さい'];
    return view('hello.auth', $param);
  }

  public function postAuth(Request $request) {
    $email = $request->email;
    $password = $request->password;
    if(Auth::attempt(['email' => $email, 'password' => $password])) {
      $msg = 'ログインしました。(' . Auth::user()->name . ')';
    } else {
      $msg = 'ログインに失敗しました。';
    }
    return view('hello.auth', ['message' => $msg]);
  }

  public function show(Request $request)
  {
    $page = $request->page;
    $items = DB::table('people')
      ->offset($page * 2)
      ->limit(3)
      ->get();
    return view('hello.show', ['items' => $items]);
  }

  public function post(Request $request)
  {
    $items = DB::select('select * from people');
    return view('hello.index', ['items' => $items]);
  }

  public function add(Request $request)
  {
    return view('hello.add');
  }

  public function create(Request $request)
  {
    $param = [
      'name' => $request->name,
      'mail' => $request->mail,
      'age' => $request->age,
    ];
    // DB::insert('insert into people (name,mail,age) values (:name,:mail,:age)', $param);
    DB::table('people')->insert($param);
    return redirect('/hello');
  }

  public function edit(Request $request)
  {
    // $item = DB::select('select * from people where id = :id', $param);
    $item = DB::table('people')->where('id', $request->id)->first();
    return view('hello.edit', ['form' => $item]);
  }

  public function update(Request $request)
  {
    $param = [
      'id' => $request->id,
      'name' => $request->name,
      'mail' => $request->mail,
      'age' => $request->age,
    ];
    DB::table('people')->where('id', $request->id)->update($param);
    return redirect('/hello');
  }

  public function del(Request $request)
  {
    $item = DB::table('people')->where('id', $request->id)->first();
    return view('hello.del', ['form' => $item]);
  }

  public function remove(Request $request)
  {
    DB::table('people')->where('id', $request->id)->delete();
    return redirect('/hello');
  }

  public function rest(Request $request)
  {
    return view('hello.rest');
  }

  public function ses_get(Request $request)
  {
    // ->session()->get('msg')でsessionのmsgキーを取得する
    $msg = $request->session()->get('msg');
    return view('hello.session',['session_data' => $msg]);
  }

  public function ses_put(Request $request)
  {
    $session_data = $request->input;
    // ->session()->put('msg',〇〇)でsessionのmsgキーに値を保存する
    $msg= $request->session()->put('msg', $session_data);
    return redirect('hello/session');
  }
}
