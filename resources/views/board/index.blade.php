@extends('layouts.helloapp')

@section('title', 'Board.index')

@section('menubar')
@parent
ボード・ページ
@endsection

@section('content')
<table>
  <tr><th>Message</th><th>Name</th></tr>
  @foreach ($items as $item)
    <tr>
      <td>{{ $item->message }}</td>
      <td>{{ $item->person->name }}</td>
    </tr>
  @endforeach

 {{-- <tr><th>Data</th></tr>
 @foreach ($items as $item)
   <tr><td>{{ $item->getData() }}</td></tr>
 @endforeach --}}
 
</table>
@endsection

@section('footer')
copyright 2023 tuyano.
@endsection