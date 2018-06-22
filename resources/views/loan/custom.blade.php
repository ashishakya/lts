@extends('layout.app')

@section('content')

<h1>LIST OF PAYMENTS FOR SPECIFIC LOAN</h1>

<a href="{{route('loans.index')}}">VIEW ALL LOANS ISSUED</a><hr>


<table class="table table-sm">
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


<b><a style="color:red;" href="{{route('payments.getPdf',$loan->id)}}">GENERATE PDF</a></b>

<table class="table">
		<thead class="thead-dark">
			<th>SN</th>
			<th>Tranx Id</th>
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
		</thead>

	@foreach($payments as $key=>$payment)
		<tr>
			<td>{{++$key}}</td>
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
		<td colspan="8" style="text-align: right;"><b>TOTAL PAYMENT</b></td>
		<td><b><u>{{sprintf('Rs.%s/-',$payments->sum('amount'))}}</u></b></td>
	</tr>
	<tr>
		<td colspan="8" style="text-align: right;"><b>TOTAL INTEREST PAYABLE</b></td>
		<td><b><u>{{sprintf('Rs.%s/-',round($payments->sum('interest_amount',4) ) )}}</u></b></td>
	</tr>
</table><br><br><br>



<table class="table">
	<thead class="thead-dark">
		<th>Date</th>
		<th>Trx Id</th>
		<th>Cr</th>
		<th>Dr</th>
		<th>Interest Amount</th>
	</thead>
	<tr>
			<!-- This section contains data from loan_id -->

		<td>{{$loan->created_at->toDateString()}}</td>
		<td>{{$loan->loan_id}}</td>
		<td style="text-align: center;">-</td>
		<td>{{$loan->amount_rs}}</td>
		<td style="text-align: center;">-</td>
	</tr>
	@foreach($payments as $key=>$payment)
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

		<td><b>{{sprintf('Rs.%s/-',$payments->sum('amount'))}}</b></td>
		<td></td>
		<td><b>{{sprintf('Rs.%s/-',round($payments->sum('interest_amount',4) ) )}}</b></td>
	</tr>
</table>
@endsection