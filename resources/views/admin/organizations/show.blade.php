@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-8 col-sm-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3 border-bottom">
                        <div class="col d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mt-2 card-title">Information</h5>
                            </div>
                            <div>
                                <a class="mb-1 btn btn-primary" href="{{ route('admin.organizations.edit', $organization->id) }}">
                                    <i class="fas fa-edit"></i> Edit organization
                                </a>
                            </div>
                        </div>
                    </div>

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>                            
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>                            
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="bg-dark text-white w-25">Name</th>
                                    <td>{{ $organization->name }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-dark text-white ">Shortname</th>
                                    <td>{{ $organization->shortname }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-dark text-white ">Phone number</th>
                                    <td>
                                        {{ $organization->phone_number }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <a class="btn btn-danger" href="{{ route('admin.organizations.index') }}">
                        <i class="fas fa-arrow-left"></i> Back to organizations
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    @if ($organization->users()->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Registered</th>
                                </thead>
                                <tbody>
                                    @foreach ($organization->users as $user)
                                        <tr>
                                            <td>
                                                <a href="{{ route('admin.users.show', $user->id) }}">
                                                    {{ $user->name }}
                                                </a>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $organization->users()->paginate() }}
                        </div>
                    @else
                        <hr>
                        <div class="alert alert-primary">
                            <h5 class="alert-heading">
                                This organization has no users.
                            </h5>
                            You can create new users for this organization <a href="{{ route('admin.users.create', ['organization' => $organization->id]) }}">
                                here</a>.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection