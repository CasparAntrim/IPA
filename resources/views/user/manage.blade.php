@extends('layouts.app')

@section('content')

    @role('super-admin')
        @foreach(Auth::user()->company->users as $user)
        <h4>{{ $user->name }}</h4>
        @endforeach
    @else
        <h5 class='alert'>I'm sorry, you don't have permission to view this page</h5>
        <h6 class='alert'>Please contact your system administrator.</h6>
    @endrole

@endsection
