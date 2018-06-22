@extends('layout.app')

@section('content')


<h1>LIST OF ALL CLIENTS</h1><hr>

{!! Form::open(['method'=>'POST','action'=>'ClientsController@filter'])!!}
	{!! Form::text('parameter',null,['placeholder'=>'Filter'])!!}
	{!! Form::submit('Find')!!}
{!! Form::close()!!}
<br>

@if($clients->isEmpty())
	<h1>Sorry no related data</h1>
@else
	<table class="table table-sm">
		<thead class="thead-dark">
				<th>Id</th>
				<th>Name </th>
				<th>Address</th>
				<th>Contact</th>
				<th>Actions</th>
		</thead>
		@foreach($clients as $client)
			<tbody>
				<td>{{$client->id}}</td>
				<td>{{$client->name}}</a></td>
				<td>{{$client->address}}</td>
				<td>{{$client->contact}}</td>
				<td><a href="{{route('clients.edit',$client->id)}}">Edit</a></td>
			</tbody>
		@endforeach
	</table>
@endif




@endsection