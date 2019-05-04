@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col d-flex flex-row justify-content-between">
                            <a class="btn btn-danger" href="{{ route('admin.users') }}">
                                <i class="fas fa-arrow-left"></i> Back to users
                            </a>
                            <a class="btn btn-primary" href="{{ route('admin.users.edit', $user->id) }}">
                                <i class="fas fa-edit"></i> Edit user
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="bg-dark text-white w-25">Nama</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-dark text-white ">Alamat surel</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-dark text-white ">Terdaftar</th>
                                    <td>
                                        {{ $user->created_at }} ( {{ $user->created_at->diffForHumans() }} )
                                    </td>
                                </tr>
                                <tr>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h5><i class="fas fa-users"></i> Informasi organisasi</h5>
                    @if ($user->organization)
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="bg-dark text-white w-25">Nama</th>
                                    <td>{{ $user->organization->name }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-dark text-white ">Shortname</th>
                                    <td>{{ $user->organization->shortname }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-dark text-white ">Nomor telepon</th>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection