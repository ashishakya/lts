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
					<tr><a href="{{route('clients.index',['key'=>'value'])}}" >asdsa</a>
						<th>Id <i class="fa fa-fw fa-table" onclick="alert('helo')" style="float: right" ></i></th>
						<th>Name <i class="fa fa-fw fa-table"></i></th>
						<th>Address <i class="fa fa-fw fa-table"></i></th>
						<th>Contact <i class="fa fa-fw fa-table"></i></th>
						{{--@can('update', new \App\Client())--}}
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