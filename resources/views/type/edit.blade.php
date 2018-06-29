@extends('layout.base')

@section('content')

	<h1>UPDATE LOAN TYPE DETAILS</h1>
	<hr>
	{!!	Form::model($type,['method'=>'PATCH','route'=>['types.update',$type->id]]) !!}

		@include('type.partials.typeForm')

		{!! Form::submit('Update Loan Type')!!}

	{!! Form::close()!!}


	{!! Form::open(['method'=>'DELETE','route'=>['types.destroy',$type->id]]) !!}

		{!! Form::submit('DELETE')!!}

	{!! Form::close()!!}

@endsection