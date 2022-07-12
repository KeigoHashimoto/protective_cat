@extends('layouts.app')

@section('content')

<p>hello {{$user->nickname}}さん</p>
<ul>
    <li>{{$user->age}}</li>
    <li>{{$user->comment}}</li>
</ul>

@endsection