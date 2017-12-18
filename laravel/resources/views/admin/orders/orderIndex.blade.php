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
                @if($order->order_processed == false)
                <div class="col-4 product-info">
                    <div class="item-info">
                        <p class="h5"> Order id: {{$order->id}} </p>
                        <p class="h5"> Name: {{$order->user->firstName}} </p>
                        <p class="h5"> Sir name: {{$order->user->lastName}}</p>
                        <p class="h5"> Amount: {{$order->amount}} </p>
                        <p class="h5"> Purchased at: {{$order->bought_at}} </p>
                        <p class="h5"> Total price: {{$order->price}} </p>
                        <p><a class="btn btn-success"  href="{{action('OrderController@show' , $order->id)}}">View</a></p>

                    </div>
                </div>
                @else
                    <div class="col-4 product-info">
                        <div class="item-info">
                            <p class="h5">Order id: {{$order->id}}</p>
                            <p class="h1">This order is already processed...</p>
                        </div>
                    </div>
                @endif
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