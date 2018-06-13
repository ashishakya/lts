@extends('layout.base')

@section('content')

<h1>This is create.blade.php</h1>
<hr>

{!! Form::open(['method'=>'POST','action'=>'LoansController@store']) !!}

	{!! Form::text('type',null,['placeholder'=>'Loan Type'])!!}{{$errors->first('type')}}<br>
	
	{!! Form::text('rate',null,['placeholder'=>'Rate'])!!}{{$errors->first('rate')}}<br>
	
	{!! Form::submit('Save New Loan Type')!!}
	{!! Form::reset('Reset')!!}
{!! Form::close()!!}

@endsection('content')