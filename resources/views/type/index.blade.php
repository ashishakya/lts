@extends('layout.app')

@section('content')
	<h1>this is Index.blade.php [List of Loan]</h1><hr>
	<table border="1">
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Interest Rate</th>
			<th>Action</th>
		</tr>
		@foreach($types as $type)
			<tr>
				<td>{{$type->id}}</td>
				<td>{{$type->name}}</td>
				<td>{{$type->rate}}</td>
				<td><a href="{{route('types.edit',$type->id)}}">Edit</a></td>
			</tr>
		@endforeach
	</table>
@endsection