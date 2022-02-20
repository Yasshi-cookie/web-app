@extends('layouts.default')

@section('title', 'おもちゃ箱')

@section('content')
<ul>
  <li><a href="{{ route('rational') }}">有理数の計算</a></li>
  <li><a href="{{ route('symmetric_group') }}">あみだくじ</a></li>
</ul>

@endsection
