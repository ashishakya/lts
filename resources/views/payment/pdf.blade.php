<h1>LIST OF PAYMENTS FOR SPECIFIC LOAN</h1>

<table border="2">
	<tr>
		<th>Loan Id:</th>
		<td>{{$loan->id}}</td>
	</tr>
	<tr>
		<th>Client Name:</th>
		<td><b><a href="{{route('clients.show',$loan_detail->clients->id)}}">{{$loan_detail->clients->name}}</a></b></td>
	</tr>
	<tr>
		<th>Total Loan Amount:</th>
		<td>{{$loan->amount_rs}}</td>
	</tr>
	<tr>
		<th>Loan Type:</th>
		<td>{{$loan_detail->types->name}}</td>
	</tr>
	<tr>
		<th>Intrest Rate:</th>
		<td>{{$loan->interest_rate}}</td>
	</tr>
	<tr>
		<th>Loan Taken Date:</th>
		<td>{{$loan->created_at}}</td>
	</tr>
</table><br>

<!-- Client Id: {{$loan->client_id}}<br> -->
<!-- Type Id: {{$loan->type_id}}<br> -->


<table border="1">
	<tr>
		<th>Id</th>
		<th>Payment Date</th>
		<th>PBP</th>
		<th>Amount</th>
		<th>PAP</th>
		<!-- <th>Loan_id</th> -->
		<!-- <th>Client_id</th> -->
		<!-- <th>Type_id</th> -->
		<th>Last Date</th>
		<th>Diffference in Date</th>
		<th>Interest Amount</th>
	</tr>
	@foreach($payments as $payment)
		<tr>
			<td>{{$payment->id}}</td>
			<td>{{$payment->created_at_date_only}}</td>
			<td>{{$payment->pbp_rs}}</td>
			<td>{{$payment->amount_rs}}</td>
			<td>{{$payment->pap_rs}}</td>
			<!-- <td>{{$payment->loan_id}}</td> -->
			<!-- <td>{{$payment->client_id}}</td> -->
			<!-- <td>{{$payment->type_id}}</td> -->
			<td>{{$payment->last_date_only}}</td>
			<td>{{$payment->difference_in_date}}</td>
			<td>{{$payment->interest_amount_round_value}}</td>
		</tr>
	@endforeach
	<tr>
		<td colspan="7" style="text-align: right;"><b>TOTAL PAYMENT</b></td>
		<td><b><u>{{sprintf('Rs.%s/-',$payments->sum('amount'))}}</u></b></td>
	</tr>
	<tr>
		<td colspan="7" style="text-align: right;"><b>TOTAL INTEREST PAYABLE</b></td>
		<td><b><u>{{sprintf('Rs.%s/-',round($payments->sum('interest_amount',4) ) )}}</u></b></td>
	</tr>
</table><br><br><br>



<table border="1">
	<tr>
		<th>Date</th>
		<th>Trx Id</th>
		<th>Cr</th>
		<th>Dr</th>
		<th>Interest Amount</th>

	</tr>
	<tr>
			<!-- This section contains data from loan_id -->

		<td>{{$loan->created_at->toDateString()}}</td>
		<td>{{$loan->loan_id}}</td>
		<td style="text-align: center;">-</td>
		<td>{{$loan->amount_rs}}</td>
		<td style="text-align: center;">-</td>
	</tr>
	@foreach($payments as $payment)
	<tr>
		<td>{{$payment->created_at_date_only}}</td>
		<td>{{$payment->payment_id}}</td>
		<td>{{$payment->amount_rs}}</td>
		<td>{{$payment->pap_rs}}</td>
		<td>{{$payment->interest_amount_round_value}}</td>
	</tr>
	@endforeach
	<tr>
		<th style="text-align: center;" colspan="2">Total</th>

		<td>{{sprintf('Rs.%s/-',$payments->sum('amount'))}}</td>
		<td></td>
		<td>{{sprintf('Rs.%s/-',round($payments->sum('interest_amount',4) ) )}}</td>
	</tr>
</table>
