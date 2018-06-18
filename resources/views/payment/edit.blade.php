@extends('layout.app')

@section('content')

<h1>This is edit.blade.php. hello</h1>
<hr>
{!!	Form::model($client,['method'=>'PATCH','action'=>['ClientsController@update',$client->id]]) !!}

	{!! Form::label('name','Client Name: ')!!}
	{!! Form::text('name',null,['placeholder'=>'Client Name'])!!}<br>

	{!! Form::label('address','Address: ')!!}
	{!! Form::text('address',null,['placeholder'=>'Client\'s Address'])!!}<br>

	{!! Form::label('contact','Contact: ')!!}
	{!! Form::text('contact',null,['placeholder'=>'Contact'])!!}<br>

	{!! Form::submit('Update Loan Type')!!}

{!! Form::close()!!}


{!! Form::open(['method'=>'DELETE','action'=>['ClientsController@destroy',$client->id]]) !!}
	{!! Form::submit('DELETE')!!}
{!! Form::close()!!}


@endsection('content')