@extends('layout.base')

@section('content')

	<h1>LIST OF PAYMENTS OF:</h1>

	{{--Loan Detail + Customer Detail at top --}}
	@include('loan.partials.loanDetail')

	<b><a style="color:red;" href="{{route('payments.detailView',$loan->id)}}">View Detail View</a></b>
	|
	<b><a style="color:red;" href="{{route('payments.pdf',$loan->id)}}">Generate PDF</a></b>

	<b style="float: right">Accrued Interest: {{$loan->InterestTillDate}}</b>

	{{--Payment Table: Official View--}}
	@include('loan.partials.officialPaymentTable')

@endsection
