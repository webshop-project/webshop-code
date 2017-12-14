@extends('layouts/adminMaster')

@section('content')
    <div class="container">

        <div class="container indexTitle col-12">
            <h2>order</h2>
        </div>
        <div class="jumbotron">
            <h5 class="h1">Order id: {{$orders->id}}</h5>
            <h5 class="h1">Name: {{$orders->user->firstName}} {{$orders->user->lastName}}</h5>
            <h5 class="h1">Amount: {{$orders->amount}}</h5>
            <h5 class="h1">Total price: {{$orders->amount * $orders->price}}</h5>
            <h5 class="h1">Date: {{$orders->bought_at}}</h5>

            <form action="{{action('OrderController@update', $orders->id)}}">
                {{csrf_field()}}
                <input class="btn btn-primary" type="submit" value="Finish Order" id="finishButton">
            </form>
        </div>
    </div>
@endsection

@if ( $errors->any() )
    @foreach($errors->all() as $error)
        <li> {{ $error }} </li>
    @endforeach
@endif
