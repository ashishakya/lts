@extends('layout.app')

@section('content')


<h1>LIST OF ALL PAYMENTS</h1><hr>
<table border="1">
	<tr>
		<th>Id</th>
		<th>Amount</th>
		<th>Loan_Id</th>
		<!-- <th>Client_id</th> -->
		<th>Client Name</th>

		<!-- <th>Type_id</th> -->
		<th>Type Name</th>
		<th>Payment Date</th>
		<th>Action</th>
	</tr>
	@foreach($payments as $payment)
		<tr>
			<td>{{$payment->id}}</td>
			<td>{{$payment->amount_rs}}</a></td>
			<td>{{$payment->loan_id}}</td>
			<!-- <td>{{$payment->client_id}}</td> -->
			<td>{{$payment->client->name}}</td>
			<!-- <td>{{$payment->type_id}}</td> -->
			<td>{{$payment->type->name}}</td>
			<td>{{$payment->created_at}}</td>

			<td><a href="">Action</a></td>
		</tr>
	@endforeach
</table>

@endsection