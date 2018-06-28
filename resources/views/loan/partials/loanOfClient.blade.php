<table class="table table-sm">
	<thead class="thead-dark">
	<th>Loan Id</th>
	<th>Type Name</th>
	<th>Amount</th>
	<th>Interest Rate</th>
	<th>Action</th>
	</thead>
	@foreach($client->loans as $loan)
		<tr>
			<td>{{$loan->id}}</td>

			<td>{{$loan->types->name or ''}}</td>

			<td>{{$loan->amount_rs}}</td>
			<td>{{$loan->interest_rate}}</td>

			<!-- checks relation with payments	 -->

			@if($loan->payments()->exists())
				<td><a href="{{route('loans.getById',$loan->id)}}">View Payments</a></td>
			@else
				<td>No Payments</td>
			@endif
		</tr>
	@endforeach

</table>