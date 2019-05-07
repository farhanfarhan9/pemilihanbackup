@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row border-bottom pb-3 mb-3">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h3 class="font-weight-normal">
                        <i class="fas fa-person-booth"></i> Pemilih terdaftar
                    </h3>
                    <div>
                        <a class="btn btn-primary border-0 shadow-sm" href="{{ route('voters.create') }}">
                            <i class="fas fa-person-booth"></i> Tambah pemilih
                        </a>
                        <a class="btn btn-secondary border-0 shadow-sm" href="#">
                            <i class="fas fa-upload"></i> Impor pemilih
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <ul>
                    @foreach ($voters as $voter)
                        <li>{{ $voter->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection