@extends('layout.base')

@section('content')

<h1>This is show.blade.php</h1>
<hr>
<h1><a href="{{route('loans.edit',$loan->id)}}">{{$loan->type}} Loan</a></h1>
<ul>
	@foreach($clients as $client)
		<li>{{$client->name}}</li>
	@endforeach
</ul>

@endsection('content')