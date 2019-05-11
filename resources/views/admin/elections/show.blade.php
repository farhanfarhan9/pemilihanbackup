@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<th>Nama</th>
								<th>Registrasi dibuka pada</th>
								<th>Registrasi ditutup pada</th>
								<th>Voting dibuka pada</th>
								<th>Voting ditutup pada</th>
								<th>Aksi</th>
							</thead>
							<tbody>
								@foreach($elections as $election)
									<tr>
										<td>{{$election->name}}</td>
										<td>{{$election->registration_opened_on}}</td>
										<td>{{$election->registration_closed_on}}</td>
										<td>{{$election->voting_starts_on}}</td>
										<td>{{$election->voting_ends_on}}</td>
										<td>
											<a class="btn btn-sm btn-success mb-1" href="{{ route('admin.elections.edit', $election->id) }}"><i class="fas fa-edit"></i>Ubah
                                             </a>
                                             <form action="{{route('admin.elections.destroy',$election->id)}}" method="post">
		                                    @csrf
		                                    @method('DELETE')
		                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
		                                  </form>
											
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection