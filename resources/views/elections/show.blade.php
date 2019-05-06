@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="font-weight-normal">{{ $election->name }}</h3>
            </div>
        </div>
    </div>
@endsection