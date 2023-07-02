@extends('layouts.helloapp')

@section('title', 'Show')

@section('menubar')
@parent
詳細ページ
@endsection

@section('content')
@if ($items != null)
<table>
  @foreach ($items as $item)
  <tr>
    <th>id: </th>
    <td>{{ $item->id }}</td>
  </tr>
  <tr>
    <th>name: </th>
    <td>{{ $item->name }}</td>
  </tr>
  <tr>
    <th>mail: </th>
    <td>{{ $item->mail }}</td>
  </tr>
  <tr>
    <th>age: </th>
    <td>{{ $item->age }}</td>
  </tr>
  @endforeach
</table>
@endif

{{-- <table>
  <tr>
    <th>id: </th>
    <td>{{ $item->id }}</td>
  </tr>
  <tr>
    <th>name: </th>
    <td>{{ $item->name }}</td>
  </tr>
  <tr>
    <th>mail: </th>
    <td>{{ $item->mail }}</td>
  </tr>
  <tr>
    <th>age: </th>
    <td>{{ $item->age }}</td>
  </tr>
</table> --}}
@endsection

@section('footer')
copyright 2023 tuyano.
@endsection