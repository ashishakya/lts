@extends('layout.base')

@section('content')

	<h1>LIST OF PAYMENTS OF:</h1>

	{{--Loan Detail + Customer Detail at top --}}
	@include('loan.partials.loanDetail')

	<a style="color:red;" href="{{route('payments.detailView',$loan->id)}}">
		<i class="fa fa-external-link-square" aria-hidden="true"></i>
	</a>
	&nbsp;
	<a style="color:red;" href="{{route('payments.pdf',$loan->id)}}">
		<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
	</a>




	<b style="float: right">Accrued Interest: {{$loan->InterestTillDate}}</b>

	{{--Payment Table: Official View--}}
	@include('loan.partials.officialPaymentTable')

@endsection
