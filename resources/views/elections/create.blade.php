@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-body">

					

					<form method="post" action="{{route('elections.store')}}">
						@csrf
						
					</form>		
				</div>
			</div>
		</div>
	</div>
</div>
@endsection