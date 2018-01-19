@extends('layouts/adminMaster')
@section('title')
    Orders not shipped
@endsection

@section('content')
    <div class="container">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        <div class="indexTitle">
            <h2 id="title">NOT SHIPPED ORDERS</h2>
        </div>

        <div class="row row-sizer-userinfo">
            @foreach($orders as $order)
                <div class="col-4 product-info">
                    <div class="item-info">
                        <p class="h5"> Order id: {{$order->id}} </p>
                        <p class="h5"> Name: {{$order->user->name}} </p>
                        <p class="h5"> Amount: {{$order->amount}} </p>
                        <p class="h5"> Purchased at: {{$order->bought_at}} </p>
                        <p class="h5"> Total price: {{$order->price}} </p>
                        <p><a class="btn btn-primary"  href="{{action('OrderController@show' , $order->id)}}">View</a></p>
                    </div>
                </div>
            @endforeach
        </div>
        {{$orders->links()}}
    </div>



@endsection

