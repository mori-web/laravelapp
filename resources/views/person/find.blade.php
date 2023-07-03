@extends('layouts.helloapp')

@section('title','Person.index')

@section('menubar')
@parent
インデックスページ
@endsection


@section('content')
<div class="container">
  <form action="/person/find" method="post">
    @csrf
    <input type="text" name="input" value="{{ $input }}">
    <input type="submit" value="find">
  </form>

  @if (isset($item))
  <div class="mt-3">
    
    <table>
      @foreach ($item as $a)
      <tr>
        <th>Data</th>
      </tr>
      <tr>
        <td>{{ $a->getData() }}</td>
      </tr>
      @endforeach
    </table>
  </div>
  @endif
</div>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection