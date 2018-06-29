@extends('layout.base')

@section('content')

	<h1>REGISTER NEW LOAN TYPE</h1>
	<a href="{{route('types.index')}}">VIEW ALL ACTIVE LOAN TYPES</a>
	<hr>

	{!! Form::open(['method'=>'POST','route'=>'types.store']) !!}

		@include('type.partials.typeForm')

		{!! Form::submit('Save New Loan Type')!!}
		{!! Form::reset('Reset')!!}

	{!! Form::close()!!}

@endsection