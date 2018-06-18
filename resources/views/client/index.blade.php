@extends('layout.app')

@section('content')


<h1>This is Index.blade.php [List of all clients]</h1><hr>
<table border="1">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Address</th>
		<th>Contact</th>
		<th>Actions</th>
	</tr>
	@foreach($clients as $client)
		<tr>
			<td>{{$client->id}}</td>
			<td>{{$client->name}}</a></td>
			<td>{{$client->address}}</td>
			<td>{{$client->contact}}</td>
			<td><a href="{{route('clients.edit',$client->id)}}">Edit</a></td>
		</tr>
	@endforeach
</table>

@endsection