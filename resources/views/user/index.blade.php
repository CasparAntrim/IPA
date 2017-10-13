@extends('layouts.app')

@section('content')

    @foreach(Auth::user()->company->users as $user)
        <h6>{{ $user->name }}</h6>
    @endforeach

@endsection
