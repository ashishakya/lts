@extends('layout.app')

@section('content')

<h1>CLIENTS'S DETAIL</h1>
<hr>
<table class="table table-sm">
	<thead class="thead-dark">
		<th>Id</th>
		<th>Name</th>
		<th>Address</th>
		<th>Contact</th>
	</thead>
	<tbody>
		<td>{{$client->id}}</td>
		<td>{{$client->name}}</td>
		<td>{{$client->address}}</td>
		<td>{{$client->contact}}</td>
	</tbody>
</table>
@endsection('content')