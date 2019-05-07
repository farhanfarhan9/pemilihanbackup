@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>{{ $voter->name }}</h2>
            </div>
        </div>
    </div>
@endsection