@extends('layout.app')

@section('content')

<?php use App\Client;?>
<?php use App\Type;?>



<h1>this is Index.blade.php</h1><hr>
<table border="1">
	<tr>
		<th>Loan Id</th>
		<th>Client Id</th>
		<th>Type Id</th>
		<th>Amount</th>
		<th>Interest Rate</th>
	</tr>
	@foreach($loans as $loan)
		<tr>
			<td>{{$loan->id}}</td>


			<!-- <td>{{$loan->client_id}}</td> -->
			<td>{{Client::find($loan->client_id)->name}}</td>

			<td>{{$loan->type_id}}</td>

			<td>{{$loan->amount}}</td>
			<td>{{$loan->interest}}</td>
		</tr>
	@endforeach

</table>
<!-- <ul>
	@foreach($loans as $loan)
		<li><a href="{{route('loans.show',$loan->id)}}">{{$loan->id}}</a></li>
	@endforeach

</ul> -->
@endsection