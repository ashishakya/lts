<table class="table">
	<thead class="thead-dark">
	<th>Date</th>
	<th>Trx Id</th>
	<th>Cr</th>
	<th>Dr</th>
	<th>Interest Amount</th>
	<th>Action</th>
	</thead>
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
			@if($payment->interest_paid == 0)
				<td><i><a style="color: red" href="{{route('payment.ind.interest',$payment->id)}}" onclick="return confirm('Are you sure?')"><i>Pay Interest</i></a></i></td>
			@else
				<td><i style="color:#1c7430">Paid</i></td>
			@endif
		</tr>
	@endforeach
	<tr>
		<th style="text-align: center;" colspan="2">Total</th>

		<td><b>{{$loan->sum_of_amount}}</b></td>

		<td></td>

		<td><b>{{$loan->sum_of_all_interest}}</b></td>

		@if($loan->payments->contains('interest_paid',0))
			<td><b><i><a href="{{route('payment.all.interest',$loan->id)}}" onClick="return confirm('Are you sure?')">{{$loan->sum_of_payable_interest}}</a></i></b></td>
		@else
			<td><b>Paid</b></td>
		@endif
	</tr>

</table>