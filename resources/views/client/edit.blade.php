@extends('layout.base')

@section('content')

	<h1>UPDATE CLIENT'S DETAIL</h1>
	<hr>

	{!!	Form::model($client,['method'=>'PATCH','route'=>['clients.update',$client->id] ]) !!}

		@include('client.partials.clientForm')


		{!! Form::submit('Update Loan Type')!!}

	{!! Form::close()!!}


	{!! Form::open(['method'=>'DELETE','route'=>['clients.destroy',$client->id]]) !!}

		{!! Form::submit('DELETE')!!}

	{!! Form::close()!!}

@endsection