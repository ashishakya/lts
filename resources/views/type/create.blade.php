@extends('layout.app')

@section('content')

<h1>This is create.blade.php</h1>
<hr>

{!! Form::open(['method'=>'POST','action'=>'TypesController@store']) !!}

	{!! Form::text('name',null,['placeholder'=>'Loan Type'])!!}{{$errors->first('type')}}<br>
	
	{!! Form::text('rate',null,['placeholder'=>'Rate'])!!}{{$errors->first('rate')}}<br>
	
	{!! Form::submit('Save New Loan Type')!!}
	{!! Form::reset('Reset')!!}
{!! Form::close()!!}

@endsection('content')