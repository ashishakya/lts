@extends('layout.base')

@section('content')

<h1>This is show.blade.php</h1>
<hr>
<h1><a href="{{route('loans.edit',$loan->id)}}">{{$loan->type}} Loan</a></h1>

@endsection('content')