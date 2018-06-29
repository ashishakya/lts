@extends('layout.base')

@section('content')

	<h1>ISSUE NEW LOAN</h1>
	<a href="{{route('loans.index')}}">VIEW ALL LOANS</a>
	<hr>


	{!! Form::open(['method'=>'POST','route'=>'loans.store']) !!}
		<!-- for client name -->
		{!! Form::label('client_id','CLIENT NAME:')!!}
		{!! Form::select('client_id', $bindContact)!!} <br>

		<!-- for loan type -->
		{!! Form::label('type_id','LOAN TYPE:')!!}
		{!! Form::select('type_id',$types)!!} <br>

		<!-- for loan amount -->
		{!! Form::label('amount','Amount:')!!}
		{!! Form::text('amount',null,['placeholder'=>'Amount'])!!}{{$errors->first('amount')}}<br>

		<!-- for interest rate:javaScript -->
		<!-- {!! Form::label('rate','Interest Rate:')!!}
		{!! Form::text('rate',null,['placeholder'=>'Interest Rate'])!!}<br>-->


		{!! Form::submit('Save New Loan Type')!!}
		{!! Form::reset('Reset')!!}
	{!! Form::close()!!}

@endsection


