@extends('layout.base')

@section('content')

	<h1>REGISTER NEW CLIENT</h1>

	<a href="{{route('clients.index')}}">VIEW ALL ACTIVE CLIENTS</a>

	<hr>

	<div class="card card-register mx-auto mt-5">
		<div class="card-header">REGISTER NEW CLIENT</div>
			<div class="card-body">
				{!! Form::open(['method'=>'POST', 'route'=>'clients.store ']) !!}

					@include('client.partials.clientForm')

					{!! Form::submit('Save New Loan Type')!!}
					{!! Form::reset('Reset')!!}

				{!! Form::close()!!}
			</div>
		</div>
	</div>

@endsection()