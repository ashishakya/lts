@extends('layout.base')

@section('content')

<h1>This is edit.blade.php</h1>
<hr>

{!! Form::model($loan,['method'=>'PATCH','action'=>['LoansController@update',$loan->id]]) !!}

	{!! Form::text('type',null,['placeholder'=>'Loan Type'])!!}{{$errors->first('type')}}<br>
	
	{!! Form::number('rate',null,['placeholder'=>'Rate'])!!}{{$errors->first('rate')}}<br>
	
	{!! Form::submit('Update Loan Type')!!}

{!! Form::close()!!}


{!! Form::open(['method'=>'DELETE','action'=>['LoansController@destroy',$loan->id]]) !!}
	{!! Form::submit('DELETE')!!}	
{!! Form::close()!!}




@endsection('content')