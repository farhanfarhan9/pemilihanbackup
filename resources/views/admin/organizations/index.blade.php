@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-auto d-flex flex-row">
                            <a class="btn btn-primary" href="{{ route('admin.organizations.create') }}" role="button">
                                <i class="fas fa-plus"></i> Create new Organization
                            </a>
                        </div>
                        <div class="col-auto ml-md-auto">
                            <form class="form-inline" action="{{ route('admin.organizations.index') }}" method="GET">
                                <div class="input-group">
                                  <input type="text" class="form-control" placeholder="Search an organization" name="search" autocomplete="off" value="{{ request('search') }}">
                                  <div class="input-group-append">
                                    @if (request('search'))
                                        <a class="btn btn-outline-danger" href="{{ route('admin.organizations.index') }}">
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

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>                            
                        </div>
                    @endif

                    @if ($organizations->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Have</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($organizations as $organization)
                                        <tr>
                                            <td>{{ $organization->id }}</td>
                                            <td>{{ $organization->name }}</td>
                                            <td>{{ $organization->users->count() }} {{ Str::plural('user', $organization->users->count()) }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ route('admin.organizations.show', $organization->id) }}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-danger delete-organization" href="#">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $organizations->links() }}
                        </div>
                    @else
                        <div class="text-center">
                            <div class="alert alert-primary">
                                Organization(s) not found.
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection