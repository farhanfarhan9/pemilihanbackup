@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-body">
					<form action="{{route('elections.update',$election->id)}}" method="POST">
						@csrf
						@method('PUT')
						<label for="">Nama</label>
						<input type="text" name="name" value="{{$election->name}}" class="form-control">
						<br>
						<label for="">Registrasi dibuka pada</label>
						<input type="datetime" name="registration_opened_at" value="{{$election->registration_opened_at}}" class="form-control">
						<br>
						<label for="">Registrasi ditutup pada</label>
						<input type="datetime" name="registration_ends_at" value="{{$election->registration_ends_at}}" class="form-control">
						<br>
						<label for="">Voting dibuka pada</label>
						<input type="datetime" name="voting_starts_at" value="{{$election->voting_starts_at}}" class="form-control">
						<br>
						<label for="">Voting ditutup pada</label>
						<input type="datetime" name="voting_closed_on" value="{{$election->voting_closed_on}}" class="form-control">
						<br>
						<input type="submit" class="btn btn-primary" value="Simpan">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection