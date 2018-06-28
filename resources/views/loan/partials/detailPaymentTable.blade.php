<table class="table">
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
		<th>Action</th>
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
			@if($payment->interest_paid == 0)
				{{--<td><i><a style="color: red" href="{{route('payment.ind.interest',$payment->id)}}" onclick="return confirm('Are you sure?')"><i>Pay Interest</i></a></i></td>--}}
				<td><i><a style="color: red" href="{{route('payment.ind.interest',$payment->id)}}" onclick="return confirm('Are you sure?')"><i>Pay Interest</i></a></i></td>
			@else
				<td><i style="color:#1c7430">Paid</i></td>
			@endif
		</tr>
	@endforeach
	<tr>
		<td colspan="8" style="text-align: right;"><b>PAYABLE INTEREST AMOUNT</b></td>
{{--		<td><b>{{sprintf('Rs.%s/-',round($loan->payments->where('interest_paid',0)->sum('interest_amount')))}}</b></td>--}}
		<td><b><i><a href="{{route('payment.all.interest',$loan->id)}}" onClick="return confirm('Are you sure?')">{{$loan->sum_of_payable_interest}}</a></i></b></td>
	</tr>
	<tr>
		<td colspan="8" style="text-align: right;"><b>TOTAL PAYMENT</b></td>
		<td><b>{{$loan->sum_of_amount}}</b></td>
		@if($loan->payments()->orderBy('id','desc')->first()->pap == 0)
			<td><b style="color: #1e7e34"><i>Loan Cleared</i></b></td>
		@else
			<td><b style="color:red"><i>Unclear</i></b></td>
		@endif
	</tr>
	<tr>
		<td colspan="8" style="text-align: right;"><b>TOTAL INTEREST AMOUNT</b></td>
		{{--<td><b><u>{{sprintf('Rs.%s/-',round($loan->payments->sum('interest_amount') ) )}}</u></b></td>--}}
		<td><b>{{$loan->sum_of_all_interest}}</b></td>
		@if($loan->payments->contains('interest_paid',0))
			<td><b><i><a href="{{route('payment.all.interest',$loan->id)}}" onClick="return confirm('Are you sure?')">Pay All Interest</a></i></b></td>
		@else
			<td><b>Paid</b></td>
		@endif
	</tr>
</table><br><br><br>