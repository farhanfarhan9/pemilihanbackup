@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h4 class="font-weight-normal">{{ $election->name }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection