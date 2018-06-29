@extends('layout.app')

@section('content')

	{{--<h1>PDF VERSION</h1>--}}
	 {{--Client - Loan Detail--}}
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



	{{--Payment Table--}}
	<table class="table table-bordered" style="width: 80%;">
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

@endsection
