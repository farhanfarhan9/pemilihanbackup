@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col-md-6 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <h5 class="card-title text-secondary border-bottom py-2">
                                <i class="fas fa-user"></i> Informasi akun
                            </h5>
                        </div>

                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama lengkap" autocomplete="name">
                            
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Alamat email" autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="Nomor telepon atau ponsel" autocomplete="phone-number">
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="password-confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi password" autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <h5 class="card-title text-secondary border-bottom py-2">
                                <i class="fas fa-building"></i> Informasi organisasi
                            </h5>
                        </div>

                        <div class="form-group">
                            <input id="org-name" type="text" class="form-control @error('org_name') is-invalid @enderror" name="org_name" placeholder="Nama organisasi" autocomplete="organization">
                            @error('org_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="org-phone-number" type="text" class="form-control @error('org_phone_number') is-invalid @enderror" name="org_phone_number" placeholder="Nomor telepon atau ponsel organisasi" autocomplete="phone-number">
                            @error('org_phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea id="org-address" class="form-control @error('org_address') is-invalid @enderror" name="org_address" placeholder="Alamat lengkap organisasi"></textarea>
                            @error('org_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox mb-3">
                              <input type="checkbox" class="custom-control-input" id="agreement" name="agreement">
                              <label class="custom-control-label" for="agreement">Saya telah membaca dan menyetujui <a href="#">syarat</a> dan <a href="#">ketentuan</a> yang berlaku.</label>
                            </div>
                            <button type="submit" class="w-100 btn btn-primary border-0">
                                <i class="fas fa-check"></i> Daftar sekarang
                            </button>
                        </div>
                    </div>
        </div>
    </div>
</div>
@endsection
