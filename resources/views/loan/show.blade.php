{{--Client -> * Loans--}}

@extends('layout.base')
@section('content')

    {{--Table:Client's Detail:--}}
    @include('loan.partials.clientDetail')

    <hr>

    <h3>LOAN DETAILS</h3>

    {{--Table:Clients's * loans--}}
    @include('loan.partials.loanOfClient')


@endsection