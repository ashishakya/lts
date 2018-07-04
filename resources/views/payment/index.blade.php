@extends('layout.base')

@section('content')
	<h1>LIST OF ALL PAYMENTS</h1>
	<hr>
	<div style="float: right">
		{!! Form::open() !!}
			{!! Form::text('startDate',null,['placeholder'=>'Select Starting Date','id'=>'datepicker']) !!}
			{!! Form::text('startDate',null,['placeholder'=>'Select Ending Date']) !!}
		{!! Form::close() !!}
	</div>

	<table class="table table-sm">
		<thead class="thead-dark">
		<th>Id</th>
		<th>Client Name</th>
		<th>Amount</th>
		<th>Loan_Id</th>
		<th>Type Name</th>
		<th>Payment Date</th>
		<th>Action</th>
		</thead>

		@foreach($payments as $payment)
			<tbody>
			<td>{{$payment->id}}</td>
			<td>{{$payment->client->name}}</td>
			<td>{{$payment->amount_rs}}</td>
			<td>{{$payment->loan_id}}</td>
			<td>{{$payment->type->name}}</td>
			<td>{{$payment->created_at}}</td>
			<td><a href="">Action</a></td>
			</tbody>
		@endforeach
	</table>
@endsection