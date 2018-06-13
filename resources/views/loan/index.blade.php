@extends('layout.base')

@section('content')

<h1>This is index.blade.php [ List of loans ]</h1>
<strong ><a href="{{route('loans.create')}}">Register New Loan Type</a></strong><br>
<strong ><a href="{{route('loans.index')}}">Loan Types</a></strong>
<hr>

<ul>
	@foreach($loans as $loan)
		<li><a href="{{route('loans.show',$loan->id)}}">{{$loan->type}} Loan</a></li>
	@endforeach
</ul>
@endsection('content')