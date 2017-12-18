@extends('layouts/adminMaster')

@section('title')
     detail
@endsection

@section('content')
    <div class="container">

        <div class="container indexTitle col-12 display-3">
            <h2>order {{$orders->id}}</h2>
        </div>
        <div class="jumbotron">
            <p class="lead h1">Order id: {{$orders->id}}</p>
            <p class="lead h1">Name: {{$orders->user->firstName}} {{$orders->user->lastName}}</p>
            <hr class="my-4">
            <p class="lead h1">Amount: {{$orders->amount}}</p>
            <p class="lead h1">Total price: {{$orders->price}}</p>
            <p class="lead h1">Date: {{$orders->bought_at}}</p>

            <form action="{{action('OrderController@update', $orders->id)}}">
                {{csrf_field()}}
                <input class="btn btn-primary" type="submit" value="Process order" id="finishButton">
            </form>
        </div>
    </div>
@endsection

@if ( $errors->any() )
    @foreach($errors->all() as $error)
        <li> {{ $error }} </li>
    @endforeach
@endif
