@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create new user</h5><hr>
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Organisasi</label>

                            <select class="form-control select2 @error('organization_id') is-invalid @enderror" name="organization_id">
                                <option value="">Pilih organisasi</option>
                                @foreach($organizations as $organization)
                                    <option value="{{$organization->id}}" @if(old('organization_id') == $organization->id) selected @endif>{{ $organization->name }}</option>
                                @endforeach
                            </select>

                            @error('organization_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Nama</label>

                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>

                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>

                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">
                                <i class="fas fa-check"></i> Submit
                            </button>
                            <a class="btn btn-danger" href="{{ route('admin.users') }}">
                                <i class="fas fa-arrow-left"></i> Back to users
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection