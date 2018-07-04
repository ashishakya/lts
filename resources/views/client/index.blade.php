@extends('layout.base')

@section('content')

	<div class="card mb-3">
		<div class="card-header">
			<i class="fa fa-table"></i> LIST OF ALL CLIENTS
		</div>
		<div class="card-body">
{{--			{!! Form::open(['method'=>'POST','route'=>'clients.filter'])!!}--}}
			{!! Form::open(['method'=>'GET','route'=>'clients.index'])!!}

				{!! Form::text('parameter',null,['placeholder'=>'Filter'])!!}
				{!! Form::submit('Find')!!}
			{!! Form::close()!!} <br>

			<h5 style="text-align:right;"><a href="{{route('clients.create')}}" style="color: green;">+ REGISTER NEW CLIENT</a></h5>

			<div class="table-responsive">
				<table class="table table-bordered" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th>Id
							<div style="float: right">
								<a href="{{route('clients.index',['field'=>'id','order'=>'asc'])}}">
									<i class="fa fa-sort-numeric-asc"></i>								&nbsp;
								</a>
								<a href="{{route('clients.index',['field'=>'id','order'=>'desc'])}}">
									<i class="fa fa-sort-numeric-desc"></i>								&nbsp;
								</a>
							</div>
						</th>
						<th>Name
							<div style="float: right">
								<a href="{{route('clients.index',['field'=>'name','order'=>'asc'])}}">
									<i class="fa fa-sort-alpha-asc"></i>								&nbsp;
								</a>
								<a href="{{route('clients.index',['field'=>'name','order'=>'desc'])}}">
									<i class="fa fa-sort-alpha-desc"></i>								&nbsp;
								</a>
							</div>
						</th>
						<th>Address</th>
						<th>Contact</th>
						@can('update',App\User::class)
							<th>Actions</th>
						@endcan
					</tr>
					</thead>
					@forelse($clients as $client)
						<tbody>
						<td>{{$client->id}}</td>
						<td><a href="{{route('clients.show',$client->id)}}">{{$client->name}}</a></td>
						<td>{{$client->address}}</td>
						<td>{{$client->contact}}</td>
						@can('update',\App\User::class)
							<td><a href="{{route('clients.edit',$client->id)}}">Edit</a></td>
						@endcan
						</tbody>
					@empty
						<b style="color: orange">No Relative Client's Detail</b>
					@endforelse
				</table>
			</div>
		</div>
	</div>

@endsection