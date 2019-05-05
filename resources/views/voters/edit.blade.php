@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('voters.update', $voter->id) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" placeholder="Nama pemilih" value="{{ old('name', $voter->name) }}" autocomplete="voter-name">

                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="identity" placeholder="Nomor identitas pemilih" value="{{ old('identity', $voter->identity) }}" autocomplete="identity">
                                @error('identity')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="email" placeholder="Alamat email pemilih" value="{{ old('email', $voter->email) }}" autocomplete="email">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="phone_number" placeholder="Nomor telepon pemilih" value="{{ old('phone_number', $voter->phone_number) }}" autocomplete="phone-number">
                                @error('phone_number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary">
                                    <i class="fas fa-check"></i> Simpan
                                </button>
                                <a class="btn btn-outline-danger" href="{{ route('voters.index') }}">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection