@extends('layout.app')

@section('content')

<h1>This is show.blade.php</h1>
<hr>
<strong>
{{$client->id}}<br>
{{$client->name}}<br>
{{$client->address}}<br>
{{$client->contact}}<br>

</strong>
@endsection('content')