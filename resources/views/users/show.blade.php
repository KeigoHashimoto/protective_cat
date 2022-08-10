@extends('layouts.app')

@section('content')
<div class="user-show-wrap">
    @include('commons.profile')
    
    @include('users.user_cats')
@endsection