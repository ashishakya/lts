<table class="table table-sm">
	<tr>
		<th>Client Name:</th>
		<td><b>{{$loan->clients->name}}</b></td>
	</tr>
	<tr>
		<th>Loan Id:</th>
		<td>{{$loan->id}}</td>
	</tr>
	<tr>
		<th>Total Loan Amount:</th>
		<td>{{$loan->amount_rs}}</td>
	</tr>
	<tr>
		<th>Loan Type:</th>
		<td>{{$loan->types->name}}</td>
	</tr>
	<tr>
		<th>Interest Rate:</th>
		<td>{{$loan->interest_rate}}</td>
	</tr>
	<tr>
		<th>Loan Taken Date:</th>
		<td>{{$loan->created_at}}</td>
	</tr>
	<tr>
		<th>Loan Status:</th>
		<td>
			@if($loan->loan_clear == 1)
				<b style="color: #1e7e34">Loan Cleared</b>
			@else
				<b style="color: red">Pending</b>
			@endif
		</td>
	</tr>
</table><br>