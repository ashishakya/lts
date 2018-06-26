@extends('layout.base')
@section('content')
	{{--<a href="{{route('clients.index')}}" onclick="return confirm('Are you sure?')">Try it</a>--}}

	<h1>LIST OF PAYMENTS FOR SPECIFIC LOAN</h1>

	<a href="{{route('loans.index')}}">VIEW ALL LOANS ISSUED</a>

	{{--Loan Detail--}}
	<table class="table table-sm">
		<tr>
			<th>Client Name:</th>
			<td><b><a href="{{route('clients.show',$loan->clients->id)}}">{{$loan->clients->name}}</a></b></td>
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
	</table><br>

	<b><a style="color:red;" href="{{route('payments.getPdf',$loan->id)}}">GENERATE PDF</a></b>

	{{--Detail Table--}}
	<table class="table">
		<thead class="thead-dark">
		<th>SN</th>
		<th>Trnx Id</th>
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
					<td><i><a style="color: red" href="{{route('payment.ind.interest',$payment->id)}}" onclick="return confirm('Are you sure?')"><i>Pay Interest</i></a></i></td>
				@else
					<td><i style="color:#1c7430">Paid</i></td>
				@endif
			</tr>
		@endforeach
		<tr>
			<td colspan="8" style="text-align: right;"><b>PAYABLE INTEREST AMOUNT</b></td>
			<td><b>{{sprintf('Rs.%s/-',round($loan->payments->where('interest_paid',0)->sum('interest_amount')))}}</b></td>
		</tr>
		<tr>
			<td colspan="8" style="text-align: right;"><b>TOTAL PAYMENT</b></td>
			<td><b><u>{{sprintf('Rs.%s/-',$loan->payments->sum('amount'))}}</u></b></td>
			{{--{dd($loan->payments()->orderBy('id','desc')->first())}}--}}
			@if($loan->payments()->orderBy('id','desc')->first()->pap == 0)
				<td><b style="color: #1e7e34"><i>Loan Cleared</i></b></td>
			@else
				<td><b style="color:red"><i>Unclear</i></b></td>
			@endif
		</tr>
		<tr>
			<td colspan="8" style="text-align: right;"><b>TOTAL INTEREST AMOUNT</b></td>
			<td><b><u>{{sprintf('Rs.%s/-',round($loan->payments->sum('interest_amount') ) )}}</u></b></td>
			@if($loan->payments->contains('interest_paid',0))
				<td><b><i><a href="{{route('payment.all.interest',$loan->id)}}" onClick="return confirm('Are you sure?')">Pay</a></i></b></td>
			@else
				<td><b>Paid</b></td>
			@endif
		</tr>
	</table><br><br><br>

	{{-- table with Dr/Cr--}}
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
		@foreach($loan->payments()->orderBy('id','asc')->get() as $key=>$payment)
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
			<td><b>{{sprintf('Rs.%s/-',$loan->payments->sum('amount'))}}</b></td>
			<td></td>
			<td><b>{{sprintf('Rs.%s/-',round($loan->payments->sum('interest_amount',4) ) )}}</b></td>
		</tr>
	</table>
@endsection