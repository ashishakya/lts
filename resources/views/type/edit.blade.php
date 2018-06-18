@extends('layout.app')

@section('content')

<h1>This is edit.blade.php</h1>
<hr>
{!!	Form::model($type,['method'=>'PATCH','action'=>['TypesController@update',$type->id]]) !!}

	{!! Form::label('name','Loan Type: ')!!}
	{!! Form::text('name',null,['placeholder'=>'Loan Type'])!!}{{$errors->first('name')}}<br>


	{!! Form::label('rate','Interest Rate: ')!!}
	{!! Form::number('rate',null,['placeholder'=>'Rate'])!!}{{$errors->first('rate')}}<br>

	{!! Form::submit('Update Loan Type')!!}

{!! Form::close()!!}


{!! Form::open(['method'=>'DELETE','action'=>['TypesController@destroy',$type->id]]) !!}
	{!! Form::submit('DELETE')!!}
{!! Form::close()!!}


@endsection('content')