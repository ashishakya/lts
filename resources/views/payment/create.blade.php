@extends('layout.base')

@section('content')

	<h1>MAKE NEW PAYMENT</h1>
	<a href="{{route('payments.index')}}">VIEW ALL PAYMENTS</a>
	<hr>

	{!! Form::open(['method'=>'POST','action'=>'PaymentsController@store']) !!}

		{!! Form::label('loan_id','Loan ID: ')!!}
		{!! Form::select('loan_id', $loans_id)!!}

		{!! Form::label('amount','Amount: ')!!}
		{!! Form::text('amount',null)!!} {{$errors->first('amount')}}<br>

		@if (session('status'))
			<div class="alert alert-danger">
				{{ session('status') }}
			</div>
		@endif

		{!! Form::submit('Submit to Pay')!!}
		{!! Form::reset('Reset')!!}

	{!! Form::close()!!}

@endsection('content')