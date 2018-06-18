@extends('layout.app')

@section('content')

<h1>This is custom.blade.php [List of payments for specific loans]</h1><hr>

Loan Id: {{$loan->id}}<br>
Client Id: {{$loan->client_id}}<br>
Type Id: {{$loan->type_id}}<br>
Total Loan Amount : {{$loan->amount}}<br><br>

<table border="1">
	<tr>
		<th>Id</th>
		<th>Amount</th>
		<th>Loan_id</th>
		<th>Client_id</th>
		<th>Type_id</th>
		<th>Payment Date</th>
	</tr>
	@foreach($payments as $payment)
		
		<tr>
			<td>{{$payment->id}}</td>
			<td>{{$payment->amount}}</td>
			<td>{{$payment->loan_id}}</td>
			<td>{{$payment->client_id}}</td>
			<td>{{$payment->type_id}}</td>
			<td>{{$payment->created_at}}</td>
		</tr>
	@endforeach

	<tr>
		<td colspan="2"><b><u>{{$payments->sum('amount')}}</u></b></td>
		<td colspan="4"><b>TOTAL</b></td>
	</tr>
</table>


@endsection