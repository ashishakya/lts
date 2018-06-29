@extends('layout.base')

@section('content')

		<div class="card mb-3">
		<div class="card-header">
			<i class="fa fa-table"></i> LIST OF ALL CLIENTS</div>
		<div class="card-body">
			{!! Form::open(['method'=>'POST','route'=>'clients.filter'])!!}
				{!! Form::text('parameter',null,['placeholder'=>'Filter'])!!}
				{!! Form::submit('Find')!!}
			{!! Form::close()!!} <br>

			<h5 style="text-align:right;"><a href="{{route('clients.create')}}" style="color: green;">+ REGISTER NEW CLIENT</a></h5>

			<div class="table-responsive">
				<table class="table table-bordered"  width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name </th>
							<th>Address</th>
							<th>Contact</th>
							<th>Actions</th>
						</tr>
					</thead>
					@forelse($clients as $client)
						<tbody>
							<td>{{$client->id}}</td>
							<td><a href="{{route('clients.show',$client->id)}}">{{$client->name}}</a></td>
							<td>{{$client->address}}</td>
							<td>{{$client->contact}}</td>
							<td><a href="{{route('clients.edit',$client->id)}}">Edit</a></td>
						</tbody>
					@empty
						<b style="color: orange">No Relative Client's Detail</b>
					@endforelse
				</table>
			</div>
		</div>
	</div>

@endsection