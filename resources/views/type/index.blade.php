@extends('layout.base')

@section('content')
	<h1>LIST OF LOAN TYPES</h1><hr>
    <h5 style="text-align:right;"><a href="{{route('types.create')}}" style="color: green;">+ REGISTER NEW LOAN TYPE</a></h5>
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
				<td>
					<a href="{{route('types.edit',$type->id)}}">Edit</a>
					|
					<a href="{{route('types.show',$type->id)}}">List</a>
				</td>
			</tbody>
		@endforeach
	</table>
@endsection