@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    
                    <div class="row mb-3">
                        <div class="col-auto">
                            <a class="btn btn-primary" href="{{ route('admin.users.create') }}" role="button">
                                <i class="fas fa-plus"></i> Tambah pengguna
                            </a>
                        </div>
                        <div class="col-auto ml-md-auto">
                            <form class="form-inline" action="{{ route('admin.users') }}" method="GET">
                                <div class="input-group">
                                  <input type="text" class="form-control" placeholder="Cari pengguna" name="search" autocomplete="off" value="{{ request('search') }}">
                                  <div class="input-group-append">
                                    @if (request('search'))
                                        <a class="btn btn-outline-danger" href="{{ route('admin.users') }}">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    @endif
                                    <button class="btn btn-outline-primary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    @if ($users->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Alamat surel</th>
                                    <th>Organisasi</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ ($user->organization->name) }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-success" href="{{ route('admin.users.show', $user->id) }}">
                                                    <i class="fas fa-user-edit"></i>
                                                </a>
                                                <a class="btn btn-sm btn-danger delete-user" href="#">
                                                    <i class="fas fa-user-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $users->links() }}
                        </div>
                    @else
                        <div class="text-center">
                            <div class="alert alert-primary">
                                Tidak ditemukan pengguna terdaftar.
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection