@extends('layout.app')

@section('content')

<h1>LIST OF PAYMENTS FOR SPECIFIC LOAN</h1>

<a href="{{route('loans.index')}}">VIEW ALL LOANS ISSUED</a><hr>

Loan Id: {{$loan->id}}<br>

<!-- Client Id: {{$loan->client_id}}<br> -->
Client Name: <b><a href="{{route('clients.show',$loan_detail->clients->id)}}">{{$loan_detail->clients->name}}</a></b><br>

<!-- Type Id: {{$loan->type_id}}<br> -->
Total Loan Amount : <b>{{$loan->amount_rs}}</b><br>
Type Type: <b>{{$loan_detail->types->name}}</b><br>
Intrest Rate: <b>{{$loan->interest_rate}}</b><br>


Loan Taken Date : <b>{{$loan->created_at}}</b> <br><br>



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
</table>
@endsection