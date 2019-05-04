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
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-sm-12">
                                <h5>Informasi akun</h5>
                                <hr>
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="name" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <div class="form-group">
                                    <input type="button" class="btn btn-primary" value="simpan">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
