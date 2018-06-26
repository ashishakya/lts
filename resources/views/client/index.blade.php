@extends('layout.base')
@section('content')
	{{--<h1>LIST OF ALL CLIENTS</h1><hr>--}}
	{{--{!! Form::open(['method'=>'POST','action'=>'ClientsController@filter'])!!}--}}
		{{--{!! Form::text('parameter',null,['placeholder'=>'Filter'])!!}--}}
		{{--{!! Form::submit('Find')!!}--}}
	{{--{!! Form::close()!!}--}}
	{{--<br>--}}
	{{--@if($clients->isEmpty())--}}
		{{--<h1>Sorry no related data</h1>--}}
	{{--@else--}}
		{{--<table class="table table-sm">--}}
			{{--<thead class="thead-dark">--}}
					{{--<th>Id</th>--}}
					{{--<th>Name </th>--}}
					{{--<th>Address</th>--}}
					{{--<th>Contact</th>--}}
					{{--<th>Actions</th>--}}
			{{--</thead>--}}
			{{--@foreach($clients as $client)--}}
				{{--<tbody>--}}
					{{--<td>{{$client->id}}</td>--}}
					{{--<td><a>{{$client->name}}</a></td>--}}
					{{--<td>{{$client->address}}</td>--}}
					{{--<td>{{$client->contact}}</td>--}}
					{{--<td><a href="{{route('clients.edit',$client->id)}}">Edit</a></td>--}}
				{{--</tbody>--}}
			{{--@endforeach--}}
		{{--</table>--}}
	{{--@endif--}}
	{{--<hr>--}}
	{{--<hr>--}}
	{{--<hr>--}}
	{{--<hr>--}}
	@if($clients->isEmpty())
		<h1>Sorry no related data</h1>
	@else
		<div class="card mb-3">
		<div class="card-header">
			<i class="fa fa-table"></i> LIST OF ALL CLIENTS</div>
		<div class="card-body">
			{!! Form::open(['method'=>'POST','action'=>'ClientsController@filter'])!!}
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
					@foreach($clients as $client)
						<tbody>
							<td>{{$client->id}}</td>
							<td><a href="{{route('clients.show',$client->id)}}">{{$client->name}}</a></td>
							<td>{{$client->address}}</td>
							<td>{{$client->contact}}</td>
							<td><a href="{{route('clients.edit',$client->id)}}">Edit</a></td>
						</tbody>
					@endforeach
				</table>
			</div>
		</div>
		<div class="card-footer small text-muted">Updated {{($clients->last()->created_at->diffForHumans())}}</div>
	</div>
	@endif
@endsection