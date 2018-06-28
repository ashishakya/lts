<table border="1">
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

<table border="1">
	<thead class="thead-dark">
	<th>SN</th>
	<th>Trx Id</th>
	<th>Payment Date</th>
	<th>PBP</th>
	<th>Amount</th>
	<th>PAP</th>
	<th>Last Date</th>
	<th>Difference in Date</th>
	<th>Interest Amount</th>
	</thead>

	@foreach($loan->payments()->orderBy('id','asc')->get() as $key=>$payment)
		<tr>
			<td>{{++$key}}</td>
			<td>{{$payment->id}}</td>
			<td>{{$payment->created_at_date_only}}</td>
			<td>{{$payment->pbp_rs}}</td>
			<td>{{$payment->amount_rs}}</td>
			<td>{{$payment->pap_rs}}</td>
			<td>{{$payment->last_date_only}}</td>
			<td>{{$payment->difference_in_date}}</td>
			<td>{{$payment->interest_amount_round_value}}</td>
		</tr>
	@endforeach
	<tr>
		<td colspan="8" style="text-align: right;"><b>PAYABLE INTEREST AMOUNT</b></td>
		<td><b>{{sprintf('Rs.%s/-',round($loan->payments->where('interest_paid',0)->sum('interest_amount')))}}</b></td>
	</tr>
	<tr>
		<td colspan="8" style="text-align: right;"><b>TOTAL PAYMENT</b></td>
		<td><b>{{$loan->sum_of_amount}}</b></td>
	</tr>
	<tr>
		<td colspan="8" style="text-align: right;"><b>TOTAL INTEREST AMOUNT</b></td>
		<td><b>{{$loan->sum_of_all_interest}}</b></td>
	</tr>
</table><br><br><br>



