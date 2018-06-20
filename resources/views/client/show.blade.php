@extends('layout.app')

@section('content')

<h1>CLIENTS'S DETAIL</h1>
<hr>
<table border="1">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Address</th>
		<th>Contact</th>
	</tr>
	<tr>
		<td>{{$client->id}}</td>
		<td>{{$client->name}}</td>
		<td>{{$client->address}}</td>
		<td>{{$client->contact}}</td>
	</tr>
</table>
@endsection('content')