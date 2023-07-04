<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restdata;

class RestappController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $items = Restdata::all();
    return $items->toArray();
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('rest.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $restdata = new Restdata;
    $form = $request->all();
    unset($form['_token']);
    $restdata->fill($form)->save();
    return redirect('/rest');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $item = Restdata::find($id);
    return $item->toArray();
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
