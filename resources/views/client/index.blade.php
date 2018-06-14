@extends('layout.app')

@section('content')


<h1>this is Index.blade.php</h1>
<ul>
	@foreach($types as $type)
		<li><a href="{{route('types.show',$type->id)}}">{{$type->name}}</a></li>
	@endforeach

</ul>
@endsection