@extends('layout.base')
@section('content')
	<h1>REGISTER NEW CLIENT</h1>
	<a href="{{route('clients.index')}}">VIEW ALL ACTIVE CLIENTS</a>
	<hr>
	<div class="card card-register mx-auto mt-5">
		<div class="card-header">REGISTER NEW CLIENT</div>
		<div class="card-body">
			{!! Form::open(['method'=>'POST','action'=>'ClientsController@store']) !!}

				{!! Form::label('name','Client Name: ')!!}
				{!! Form::text('name',null,['placeholder'=>'Client Name'])!!} {{$errors->first('name')}}<br>

				{!! Form::label('address','Address: ')!!}
				{!! Form::text('address',null,['placeholder'=>'Client\'s Address'])!!} {{$errors->first('address')}}<br>


				{!! Form::label('contact','Contact: ')!!}
				{!! Form::text('contact',null,['placeholder'=>'Contact'])!!} {{$errors->first('contact')}}<br>

				{!! Form::submit('Save New Loan Type')!!}
				{!! Form::reset('Reset')!!}
			{!! Form::close()!!}
		</div>
	</div>
	</div>
@endsection()