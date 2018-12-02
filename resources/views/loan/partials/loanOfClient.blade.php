<table class="table table-sm">
	<thead class="thead-dark">
	<th>Loan Id</th>
	<th>Type Name</th>
	<th>Amount</th>
	<th>Interest Rate</th>
	<th>Action</th>
	<th>Status</th>
	</thead>
	@forelse($client->loans as $loan)
		<tr>
			<td>{{$loan->id}}</td>

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
			<td>
				@if($loan->loan_clear == 1)
					<b style="color: green">Loan Clear</b>
				@else
					<b style="color: red;">Pending</b>
				@endif
			</td>
		</tr>
	@empty
		<b style="color:orange">Customer has no Loan Detail</b>
	@endforelse

</table>