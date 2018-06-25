@extends('layout.base')

@section('content')

<h1>MAKE NEW PAYEMENT</h1>
<a href="{{route('payments.index')}}">VIEW ALL PAYMENTS</a>
<hr>

{!! Form::open(['method'=>'POST','action'=>'PaymentsController@store']) !!}

	{!! Form::label('loan_id','Loan ID: ')!!}
	{!! Form::select('loan_id', $loans_id)!!}

	{!! Form::label('amount','Amount: ')!!}
	{!! Form::text('amount',null)!!} <br>

	{!! Form::submit('Submit to Pay')!!}
	{!! Form::reset('Reset')!!}

{!! Form::close()!!}

@endsection('content')