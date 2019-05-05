@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Buat pemilihan baru</h5>

					<form method="post" action="{{route('elections.store')}}">
						@csrf

						<div class="form-group">
	                        <label for="">Nama pemilihan</label>
	                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}">
	                        @error('name')
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </span>
	                        @enderror
                        </div>
						
						<div class="form-row">
							<div class=" form-group col-lg">
								<label for="">Registrasi dibuka pada</label>
								<input class="form-control @error('registration_opened_at') is-invalid @enderror" type="text" name="registration_opened_at" id="registration_opened_at" value="{{ old('registration_opened_at') }}">
		                        @error('registration_opened_at')
		                            <span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
							</div>
							<div class="form-group col-lg">
								<label for="">Registrasi ditutup pada</label>
								<input class="form-control @error('registration_ends_at') is-invalid @enderror" type="text" name="registration_ends_at" id="registration_ends_at" value="{{ old('registration_ends_at') }}">
		                        @error('registration_ends_at')
		                            <span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-lg">
								<label for="">Voting dibuka pada</label>
								<input class="form-control @error('voting_starts_at') is-invalid @enderror" type="text" name="voting_starts_at" id="voting_starts_at" value="{{ old('voting_starts_at') }}">
		                        @error('name')
		                            <span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
							</div>
							<div class="form-group col-lg">
								<label for="">Voting ditutup pada</label>
								<input class="form-control @error('voting_closed_on') is-invalid @enderror" type="text" name="voting_closed_on" id="voting_closed_on" value="{{ old('voting_closed_on') }}">
		                        @error('name')
		                            <span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
							</div>
						</div>

						<div class="form-group">
							<div class="form-group">
                            <button class="btn btn-primary">
                                <i class="fas fa-check"></i> Simpan
                            </button>
                            <a class="btn btn-danger" href="{{ route('elections.index') }}">
                                <i class="fas fa-arrow-left"></i> Kembali ke pemilihan
                            </a>
                        </div>
						</div>                 
					</form>		
				</div>
			</div>
		</div>
	</div>
</div>
@endsection