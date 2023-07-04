@extends('layouts.helloapp')

@section('title', 'Session')

@section('menubar')
@parent
セッションページ
@endsection

@section('content')

<p>{{ $session_data }}</p>

<form action="/hello/session" method="post">
  <table>
    @csrf
    <input type="text" name="input">
    <input type="submit" value="send">
  </table>
</form>
@endsection

@section('footer')
  copyright 2023 tuyano.
@endsection