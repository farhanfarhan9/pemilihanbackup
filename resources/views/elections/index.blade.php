@extends('layouts.app')
@section('content')
<div class="container">
	<div class="card">
		<div class="card-body">
			@if(session('status'))
				<div class="alert alert-success">
					{{session('status')}}
				</div>
			@endif
			<div class="row">
				<div class="col-lg">
					<a href="{{route('elections.create')}}" class="btn btn-primary">Tambah Pemilihan</a>
				</div>
			</div>
			<br>
			<br>
			<div class="row">
				<div class="col-lg">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">No</th>
									<th scope="col">Nama</th>
									<th scope="col">Registrasi dibuka pada</th>
									<th scope="col">Registrasi ditutup pada</th>
									<th scope="col">Voting dimulai pada</th>
									<th scope="col">Voting berakhir pada</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								@if($elections->count() > 0)
									@foreach($elections as $election)
										<tr>
											<td>{{$loop->iteration}}</td>
											<td>{{$election->name}}</td>
											<td>{{$election->registration_opened_at}}</td>
											<td>{{$election->registration_ends_at}}</td>
											<td>{{$election->voting_starts_at}}</td>
											<td>{{$election->voting_closed_on}}</td>
											<td>
												<a href="{{route('candidates.index',$election->id)}}" class="btn btn-info btn-sm text-white">Lihat Kandidat</a>
												<a href="{{route('elections.edit',$election->id)}}" class="btn btn-success btn-sm">Edit</a>
												 <form onsubmit="return confirm('Delete this election permanently?')" class="d-inline" action="{{route('elections.destroy', $election->id)}}" method="POST">
					                              @csrf
					                              @method('DELETE')
					                              <input type="submit" value="Delete" class="btn btn-danger btn-sm">
					                              </form>
											</td>
										</tr>
									@endforeach
								@else
									<tr>
										<td colspan="7" class="text-center">Data tidak ada</td>
									</tr>
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection