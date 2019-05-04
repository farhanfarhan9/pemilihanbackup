@extends('layouts.organization')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-body">
					<form method="post" action="{{route('admin.elections.store')}}">
						@csrf
						<label for="">Nama</label>
						<input type="text" name="name" class="form-control">
						<br>
						<label for="">Registrasi dibuka pada</label>
						<input type="date" name="registration_opened_at" class="form-control">
						<br>
						<label for="">Registrasi ditutup pada</label>
						<input type="date" name="registration_ends_at" class="form-control">
						<br>
						<label for="">Voting dibuka pada</label>
						<input type="date" name="voting_starts_at" class="form-control">
						<br>
						<label for="">Voting ditutup pada</label>
						<input type="date" name="voting_closed_on" class="form-control">
						<br>
						<input type="submit" class="btn btn-primary" value="simpan">
					</form>		
				</div>
			</div>
		</div>
	</div>
</div>
@endsection