@extends('layout.app')

@section('content')

<h1>This is create.blade.php</h1>
<hr>

{!! Form::open(['method'=>'POST','action'=>'ClientsController@store']) !!}

	{!! Form::text('name',null,['placeholder'=>'Client Name'])!!}{{$errors->first('type')}}<br>

	{!! Form::text('address',null,['placeholder'=>'Client\'s Address'])!!}{{$errors->first('type')}}<br>

	
	
	{!! Form::text('contact',null,['placeholder'=>'Contact'])!!}{{$errors->first('rate')}}<br>
	
	{!! Form::submit('Save New Loan Type')!!}
	{!! Form::reset('Reset')!!}
{!! Form::close()!!}

@endsection('content')