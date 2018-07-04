@extends('layout.base')
@section('content')
	<h1>LIST OF ALL ISSUED LOANS</h1><hr>

	{!! Form::open(['method'=> 'GET','route'=>'loans.index']) !!}
		{!! Form::select('loanView',['All Loan','Active Loan','Cleared Loan']) !!}
		{!! Form::submit('Filter') !!}
	{!! Form::close() !!}


    <h5 style="text-align:right;"><a href="{{route('loans.create')}}" style="color: green;">+ ISSUE NEW LOAN</a></h5>

	<table class="table table-sm">
		<thead class="thead-dark">
			<th>Loan Id</th>
			<th>Client Name</th>
			<th>Type Name</th>
			<th>Amount</th>
			<th>Interest Rate</th>
			<th>Action</th>
		</thead>
		@foreach($loans as $loan)
			<tr>
				<td>{{$loan->id}}</td>

				<td><a href="{{route('clients.show',$loan->clients->id)}}">{{$loan->clients->name}}</a></td>

				<td>{{$loan->types->name or ''}}</td>

				<td>{{$loan->amount_rs}}</td>
				<td>{{$loan->interest_rate}}</td>

				<!-- checks relation with payments	 -->
				<td>
					@if($loan->payments()->exists())
						<a href="{{route('loans.getById',$loan->id)}}">View Payments</a>
					@else
						No Payments
					@endif
				</td>
			</tr>
		@endforeach
	</table>
@endsection