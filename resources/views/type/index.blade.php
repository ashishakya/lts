@extends('layout.app')

@section('content')
	<h1>LIST OF LOAN TYPES</h1><hr>
	<table class="table table-sm">
		<thead class="thead-dark">
				<th>Id</th>
				<th>Name</th>
				<th>Interest Rate</th>
				<th>Action</th>
		</thead>
		@foreach($types as $type)
			<tbody>
				<td>{{$type->id}}</td>
				<td>{{$type->name}}</td>
				<td>{{$type->rate_percent}}</td>
				<td><a href="{{route('types.edit',$type->id)}}">Edit</a></td>
			</tbody>
		@endforeach
	</table>
@endsection