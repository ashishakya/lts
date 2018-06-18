@extends('layout.app')

@section('content')

<h1>This is create.blade.php [REGISTER NEW CLIENT]</h1>
<a href="{{route('clients.index')}}">VIEW ALL ACTIVE CLIENTS</a>
<hr>

{!! Form::open(['method'=>'POST','action'=>'ClientsController@store']) !!}

	{!! Form::label('name','Client Name: ')!!}
	{!! Form::text('name',null,['placeholder'=>'Client Name'])!!}{{$errors->first('type')}}<br>

	{!! Form::label('address','Address: ')!!}
	{!! Form::text('address',null,['placeholder'=>'Client\'s Address'])!!}{{$errors->first('type')}}<br>


	{!! Form::label('contact','Contact: ')!!}
	{!! Form::text('contact',null,['placeholder'=>'Contact'])!!}{{$errors->first('rate')}}<br>

	{!! Form::submit('Save New Loan Type')!!}
	{!! Form::reset('Reset')!!}
{!! Form::close()!!}

@endsection('content')