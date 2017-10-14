@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 .mr-auto">
            <div class="card">
                <h4 class="card-header theme-faded-bg-dark">Dashboard</h4>
                <div class="card-body theme-faded-bg-light">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if( Auth::check() )
                    <h4 class="card-title text-center">{{ Auth::user()->company->name }}</h4>
                    <!-- <p class="card-text">Hello, {{ Auth::user()->name }}</p> -->
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
