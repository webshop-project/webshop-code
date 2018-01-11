@extends('layouts/adminMaster')
@section('title')
    Orders
@endsection

@section('content')
    <div class="container">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        <div class="indexTitle">
            <h2 id="title">NOT PROCESSED ORDERS</h2>
        </div>
        <div class="not-processed" id="not-processed">
            <div class="row row-sizer-userinfo">
                @foreach($orders as $order)
                    <div class="col-4 product-info">
                        <div class="item-info">
                            <p class="h5"> Order id: {{$order->id}} </p>
                            <p class="h5"> Name: {{$order->user->firstName}} </p>
                            <p class="h5"> Sir name: {{$order->user->lastName}}</p>
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
        <div class="processed" id="processed">
            <div class="row row-sizer-userinfo">

                @foreach($ordersP as $orderP)
                    <div class="col-4 product-info">
                        <div class="item-info">
                            <p class="h5"> Order id: {{$orderP->id}} </p>
                            <p class="h5"> Name: {{$orderP->user->loginName}} </p>
                            <p class="h5"> Amount: {{$orderP->amount}} </p>
                            <p class="h5"> Purchased at: {{$orderP->bought_at}} </p>
                            <p class="h5"> Total price: {{$orderP->price}} </p>
                            <p><a class="btn btn-primary"  href="{{action('OrderController@show' , $orderP->id)}}">View</a></p>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$ordersP->links()}}
        </div>
        <button id="change" class="toNotProcessed btn btn-primary" onclick="changeStatus()">Change status</button>
    </div>



@endsection

<script type="text/javascript">

    function changeStatus() {
        if(document.getElementById('not-processed').style.display === 'none'){
            document.getElementById('not-processed').style.display = 'block';
            document.getElementById('processed').style.display = 'none';
        }
        else{
            document.getElementById('not-processed').style.display = 'none';
            document.getElementById('processed').style.display = 'block';
        }
        if (document.getElementById('not-processed').style.display === 'block'){
            document.getElementById('title').innerHTML = 'NOT PROCESSED ORDERS';
        }else{
            document.getElementById('title').innerHTML = 'PROCESSED ORDERS';
        }
    }

</script>