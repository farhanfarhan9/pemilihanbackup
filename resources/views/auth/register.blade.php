@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Daftar</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="col-lg">
                                <h5>Informasi organisasi</h5>
                                <hr>
                                <div class="form-group">
                                    <label for="organization[name]">Nama</label>
                                    <input class="form-control" type="text" id="organization[name]" name="organization[name]">
                                </div>

                                <div class="form-group">
                                    <label for="organization[shortname]">Shortname</label>
                                    <input class="form-control" type="text" id="organization[shortname]" name="organization[shortname]">
                                    <small id="shortnameHelpBlock" class="form-text text-muted">
                                        Shortname terdiri dari 5-12 karakter. Digunakan sebagai alamat organisasi atau halaman pemungutan suara.
                                    </small>
                                </div>

                                <div class="form-group">
                                    <label for="organization[phone_number]">Nomor telepon</label>
                                    <input class="form-control" type="text" id="organization[phone_number]" name="organization[phone_number]">
                                </div>
                            </div>
                            <div class="col-lg">
                                <h5>Informasi akun</h5>
                                <hr>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
