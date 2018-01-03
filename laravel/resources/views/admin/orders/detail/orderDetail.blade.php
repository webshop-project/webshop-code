@extends('layouts/adminMaster')

@section('title')
    Detail
@endsection

@section('content')
    <div class="container">

        <div class="container indexTitle col-12">
            <h2>order {{$orders->id}}</h2>
        </div>
        <div class="jumbotron">
            <h5 class="h3">Order id: {{$orders->id}}</h5>
            <h5 class="h3">Name: {{$orders->user->firstName}} {{$orders->user->lastName}}</h5>
            <hr class="my-4">
            <h5 class="h4">Product name: </h5>
            <h5 class="h4">Amount: {{$orders->amount}}</h5>
            <h5 class="h4">Total price: {{$orders->price}}</h5>
            <h5 class="h4">Date: {{$orders->bought_at}}</h5>

            @if($orders->order_processed == false)
                <form action="{{action('OrderController@update', $orders->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <input class="btn btn-primary" type="submit" value="Finish Order" id="finishButton">
                </form>
            @elseif($orders->order_processed == true)
                <p class="h4 bg-success">This order has been processed...</p>
            @endif
        </div>
    </div>
@endsection

@if ( $errors->any() )
    @foreach($errors->all() as $error)
        <li> {{ $error }} </li>
    @endforeach
@endif
