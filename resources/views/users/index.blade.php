@extends('layouts.app')

@section('content')

<h2>登録ユーザー一覧</h2>
@foreach($users as $user)
    <p>{{$user->name}}</p>
@endforeach

@endsection