@extends('layouts.helloapp')

@section('title','Person.index')

@section('menubar')
@parent
インデックスページ
@endsection


@section('content')
<table>
  <tr>
    <th>Person</th>
    <th>Board</th>
  </tr>
  @foreach ($hasItems as $item)
  <tr>
    <td>{{ $item->getData() }}</td>
    <td>
      <table width="100%">
        @foreach ($item->boards as $obj)
          <tr><td>{{ $obj->getData() }}</td></tr>
        @endforeach
      </table>
    </td>
  </tr>
  @endforeach
</table>

<div style="margin:10px;"></div>

<table>
  <tr><th>Person</th></tr>
  @foreach ($noItems as $item)
    <tr>
      <td>{{ $item->getData() }}</td>
    </tr>
  @endforeach
</table>

{{-- bootstrap練習 --}}
<div class="mt-5">
  <a href="https://laravel.com/docs"><button class='btn btn-default'>Docs</button></a>
  <a href="https://laracasts.com"><button class='btn btn-primary'>Laracasts</button></a>
  <a href="https://laravel-news.com"><button class='btn btn-success'>News</button></a>
  <a href="https://blog.laravel.com"><button class='btn btn-info'>Blog</button></a>
  <a href="https://nova.laravel.com"><button class='btn btn-warning'>Nova</button></a>
  <a href="https://forge.laravel.com"><button class='btn btn-danger'>Forge</button></a>
  <a href="https://vapor.laravel.com"><button class='btn btn-link'>Vapor</button></a>
  <a href="https://github.com/laravel/laravel"><button class='btn btn-primary'>GitHub</button></a>
</div>
@endsection


@section('footer')
copyright 2020 tuyano.
@endsection