@extends('layout.base')

@section('content')

<h1>REGISTER NEW LOAN TYPE</h1>
<a href="{{route('types.index')}}">VIEW ALL ACTIVE LOAN TYPES</a>
<hr>

{!! Form::open(['method'=>'POST','action'=>'TypesController@store']) !!}

	{!! Form::label('name','Loan Type: ')!!}
	{!! Form::text('name',null,['placeholder'=>'Loan Type'])!!}{{$errors->first('name')}}<br>

	{!! Form::label('rate','Interest Rate: ')!!}
	{!! Form::text('rate',null,['placeholder'=>'Rate'])!!}{{$errors->first('rate')}}<br>

	{!! Form::submit('Save New Loan Type')!!}
	{!! Form::reset('Reset')!!}
{!! Form::close()!!}

@endsection('content')