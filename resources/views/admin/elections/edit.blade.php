@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="justify-content-center">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Edit pemilihan</h5>
					<form method="post" action="{{route('admin.elections.update', $election->id)}}">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="">Nama pemilihan</label>
							<input type="text" name="name" value="{{$election->name}}" class="form-control @error('name') is-invalid @enderror">
							@error('name')
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </span>
	                        @enderror
						</div>
						<div class="form-group">
							<label for="">Registrasi pemilih dibuka</label>
							<input type="text" name="registration_opened_on" value="{{$election->registration_opened_on}}" class="form-control @error('registration_opened_on') is-invalid @enderror">
							@error('registration_opened_on')
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </span>
	                        @enderror
						</div>
						<div class="form-group">
							<label for="">Registrasi pemilih ditutup</label>
							<input type="text" name="registration_closed_on" value="{{$election->registration_closed_on}}" class="form-control @error('registration_closed_on') is-invalid @enderror ">
							@error('registration_closed_on')
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </span>
	                        @enderror
						</div>
						<div class="form-row">
							<div class="col-lg">
								<label for="">Voting dibuka pada</label>
								<input type="text" name="voting_starts_on" value="{{$election->voting_starts_on}}" class="form-control @error('voting_starts_on') is-invalid @enderror">
								@error('voting_starts_on')
		                            <span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                            </span>
	                        	@enderror
							</div>
							<div class="col-lg">
								<label for="">Voting ditutup pada</label>
								<input type="text" name="voting_ends_on" value="{{$election->voting_ends_on}}" class="form-control @error('voting_ends_on') is-invalid @enderror">
								@error('voting_ends_on')
		                            <span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                            </span>
	                        	@enderror
							</div>
						</div>
						<div class="form-group mt-3">
							<div class="form-group">
                            <button class="btn btn-primary">
                                <i class="fas fa-check"></i> Ubah
                            </button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection