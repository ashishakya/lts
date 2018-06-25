@extends('layout.base')

@section('content')

<h1>LIST OF ALL ISSUED LOANS</h1><hr>
<table class="table table-sm">
	<thead class="thead-dark">
		<th>Loan Id</th>
		<!-- <th>Client Id</th> -->
		<th>Client Name</th>
		<!-- <th>Type Id</th> -->
		<th>Type Name</th>
		<th>Amount</th>
		<th>Interest Rate</th>
		<th>Action</th>
	</thead>
	@foreach($loans as $loan)
		<tr>
			<td>{{$loan->id}}</td>
			<!-- <td>{{$loan->clients->id}}</td> -->
			<td><a href="{{route('clients.show',$loan->clients->id)}}">{{$loan->clients->name}}</a></td>

			<!-- <td>{{$loan->types->id or ''}}</td> -->
			<td>{{$loan->types->name or ''}}</td>

			<td>{{$loan->amount_rs}}</td>
			<td>{{$loan->interest_rate}}</td>

			<!--<td><a href="{{route('loans.getById',$loan->id)}}">View Payments</a></td>-->



		<!-- checks realation with payments	 -->

			@if($loan->payments()->exists())
				<td><a href="{{route('loans.getById',$loan->id)}}">View Payments</a></td>
			@else
				<td>NO PAYMENTS</td>
			@endif

		</tr>
	@endforeach

</table>
<!-- <ul>
	@foreach($loans as $loan)
		<li><a href="{{route('loans.show',$loan->id)}}">{{$loan->id}}</a></li>
	@endforeach

</ul> -->
@endsection