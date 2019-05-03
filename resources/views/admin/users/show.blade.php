@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    
                    <h5><i class="fas fa-user"></i> Informasi akun</h5><hr>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="w-25">Nama</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat surel</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Terdaftar</th>
                                    <td>
                                        {{ $user->created_at }} ( {{ $user->created_at->diffForHumans() }} )
                                    </td>
                                </tr>
                                <tr>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h5><i class="fas fa-users"></i> Informasi organisasi</h5><hr>
                    @if ($user->organization)
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="w-25">Nama</th>
                                    <td>{{ $user->organization->name }}</td>
                                </tr>
                                <tr>
                                    <th>Shortname</th>
                                    <td>{{ $user->organization->shortname }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor telepon</th>
                                    <td>
                                        {{ $user->organization->phone_number }}
                                    </td>
                                </tr>
                                <tr>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @else
                        <div class="alert alert-warning">
                            Pengguna <strong>{{ $user->name }}</strong> tercatat belum memiliki organisasi.
                        </div>
                    @endif

                    <div>
                        <a class="btn btn-secondary" href="{{ route('admin.users') }}">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection