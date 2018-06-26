@extends('layout.base')
@section('content')

    <table class="table table-sm">
        <tr>
            <th>Id:</th>
            <td>{{$client->id}}</td>
        </tr>
        <tr>
            <th>Name:</th>
            <td>{{$client->name}}</td>
        </tr>
        <tr>
            <th>Address:</th>
            <td>{{$client->address}}</td>
        </tr>
        <tr>
            <th>Contact:</th>
            <td>{{$client->contact}}</td>
        </tr>
    </table>

    <hr>
    <h3>LOAN DETAILS</h3>
    <table class="table table-sm">
        <thead class="thead-dark">
            <th>Loan Id</th>
            <th>Type Name</th>
            <th>Amount</th>
            <th>Interest Rate</th>
            <th>Action</th>
        </thead>
    @foreach($client->loans as $loan)
        <tr>
            <td>{{$loan->id}}</td>

            <td>{{$loan->types->name or ''}}</td>

            <td>{{$loan->amount_rs}}</td>
            <td>{{$loan->interest_rate}}</td>

            <!-- checks relation with payments	 -->

            @if($loan->payments()->exists())
                <td><a href="{{route('loans.getById',$loan->id)}}">View Payments</a></td>
            @else
                <td>NO PAYMENTS</td>
            @endif
        </tr>
        @endforeach

    </table>

@endsection('content')