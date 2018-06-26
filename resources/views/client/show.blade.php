@extends('layout.base')
@section('content')
	<h1>CLIENTS'S DETAIL</h1>
	<hr>
	<table class="table table-sm">
		<thead class="thead-dark">
			<th>Id</th>
			<th>Name</th>
			<th>Address</th>
			<th>Contact</th>
			<th>View Loans</th>
		</thead>
		<tbody>
			<td>{{$client->id}}</td>
			<td>{{$client->name}}</td>
			<td>{{$client->address}}</td>
			<td>{{$client->contact}}</td>
			<td><a href="{{route('loans.show',$client->id)}}">Active Loans</a></td>
		</tbody>
	</table>
@endsection('content')