@extends('layout.app')

@section('content')

<h1>This is custom.blade.php [List of payments for specific loans]</h1>

<a href="{{route('loans.index')}}">VIEW ALL LOANS ISSUED</a><hr>

Loan Id: {{$loan->id}}<br>
Client Id: {{$loan->client_id}}<br>
Type Id: {{$loan->type_id}}<br>
Total Loan Amount : {{$loan->amount_rs}}<br>
Loan Taken Date : {{$loan->created_at}} <br><br>



<table border="1">
	<tr>
		<th>Id</th>
		<th>Amount</th>
		<th>Loan_id</th>
		<th>Client_id</th>
		<th>Type_id</th>
		<th>Last Date</th>
		<th>Payment Date</th>
		<th>Diffference in Date</th>
	</tr>

	
	@foreach($payments as $payment)
		
		<tr>
			<td>{{$payment->id}}</td>
			<td>{{$payment->amount_rs}}</td>
			<td>{{$payment->loan_id}}</td>
			<td>{{$payment->client_id}}</td>
			<td>{{$payment->type_id}}</td>
			<td>{{$payment->last_date}}</td>
			<td>{{$payment->created_at}}</td>
			<td>{{$payment->differenceInDate}}</td>
			<!-- <td>{{($payment->created_at)->diffInDays($payment->last_date)}}</td> -->
		</tr>

	<!--	$now = Carbon::today();
		$later = Carbon::today()->addDays(10);
		$diff = $later->diffInDays($now);
	-->
	@endforeach

	<tr>
		<td colspan="2"><b><u>{{sprintf('Rs.%s/-',$payments->sum('amount'))}}</u></b></td>
		<td colspan="4"><b>TOTAL</b></td>
	</tr>
	

</table>


@endsection