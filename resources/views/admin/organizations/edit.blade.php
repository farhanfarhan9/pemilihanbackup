@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit organization: {{ $organization->name }}</h5><hr>
                    
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>                            
                        </div>
                    @endif

                    <form action="{{ route('admin.organizations.update', $organization->id) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>

                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $organization->name) }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Shortname</label>

                            <input class="form-control @error('shortname') is-invalid @enderror" type="text" name="shortname" id="shortname" value="{{ old('shortname', $organization->shortname) }}">
                            @error('shortname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone number</label>

                            <input class="form-control @error('phone_number') is-invalid @enderror" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $organization->phone_number) }}">
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">
                                <i class="fas fa-check"></i> Submit
                            </button>
                            <a class="btn btn-danger" href="{{ route('admin.organizations.index') }}">
                                <i class="fas fa-arrow-left"></i> Back to organizations
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection