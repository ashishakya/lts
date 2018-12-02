<table class="table table-bordered">
	<tr class="thead-dark">
		<th>Date</th>
		<th>Trx Id</th>
		<th>Cr</th>
		<th>Dr</th>
		<th>Interest Amount</th>
		<th>Action</th>
	</tr>

	<tr>
		<!-- This section contains data from loan_id -->

		<td>{{$loan->created_at->toDateString()}}</td>
		<td>{{$loan->loan_id}}</td>
		<td style="text-align: center;">-</td>
		<td>{{$loan->amount_rs}}</td>
		<td style="text-align: center;">-</td>
		<td style="text-align: center;">-</td>

	</tr>
	@foreach($loan->payments()->orderBy('id','asc')->get() as $key=>$payment)
		<tr>
			<td>{{$payment->created_at_date_only}}</td>
			<td>{{$payment->payment_id}}</td>
			<td>{{$payment->amount_rs}}</td>
			<td>{{$payment->pap_rs}}</td>
			<td>{{$payment->interest_amount_round_value}}</td>
			<td>
				@if($payment->interest_paid == 0)
					<i><i>Interest Unpaid</i></i>
				@else
					<i style="color:#1c7430">Paid</i>
				@endif
			</td>
		</tr>
	@endforeach
	<tr>
		<th style="text-align: center;" colspan="2">Total</th>

		<td><b>{{$loan->sum_of_amount}}</b></td>

		<td></td>

		<td><b>{{$loan->sum_of_all_interest}}</b></td>
		<td>
			@if($loan->payments->contains('interest_paid',0))
				<b><i>{{$loan->sum_of_payable_interest}}</i></b>
			@else
				<b>Paid</b>
			@endif
		</td>
	</tr>
</table>