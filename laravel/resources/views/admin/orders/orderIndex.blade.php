@extends('layouts/adminMaster')
@section('title')
    Orders
@endsection

@section('content')
<div class="constainer-fluid userinfo">
    <div class="container">
        <div class="container indexTitle col-12">
            <h2>ORDERS</h2>
        </div>
        <div class="row row-sizer-userinfo">
            @foreach($orders as $order)
            <div class="col-4 product-info">
                <div class="item-info">
                    <p class="h5"> Name: {{$order->user_id}} </p>
                    <p class="h5"> Product: {{$order->product_id}} </p>
                    <p class="h5"> amount: {{$order->amount}} </p>
                    <p class="h5"> Purchased at: {{$order->bought_at}} </p>
                    <p class="h5"> total price: {{$order->price}} </p>
                    <p><a class="btn btn-success"  href="{{action('OrderController@show' , $order->id)}}">View</a></p>
                </div>
            </div>
            @endforeach
        </div>
        {{$orders->links()}}
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    </div>
</div>
@endsection