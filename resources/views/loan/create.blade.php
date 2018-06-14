@extends('layout.app')

@section('content')

<h1>This is create.blade.php</h1>
<hr>

{!! Form::open(['method'=>'POST','action'=>'LoansController@store']) !!}
	<!-- for client name -->
	{!! Form::label('client_id','CLIENT NAME:')!!}
	{!! Form::select('client_id', $clients)!!} <br>

	<!-- for loan type -->
	{!! Form::label('type_id','LOAN TYPE:')!!}
	{!! Form::select('type_id',$types)!!} <br>

	<!-- for loan amount -->
	{!! Form::label('amount','Amount:')!!}
	{!! Form::text('amount',null,['placeholder'=>'Amount'])!!}<br>

	<!-- for interest rate:javaScript -->
	<!-- {!! Form::label('rate','Interest Rate:')!!}
	{!! Form::text('rate',null,['placeholder'=>'Interest Rate'])!!}<br>

 -->

	{!! Form::submit('Save New Loan Type')!!}
	{!! Form::reset('Reset')!!}
{!! Form::close()!!}

@endsection('content')


