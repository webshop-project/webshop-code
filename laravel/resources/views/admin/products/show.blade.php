
@extends('layouts/adminMaster')
@section('title')
    Sales
@endsection


@section('content')

    <div id="salesInfo" class="container">
        <h1>Sales</h1>
        @foreach($showProduct as $productDetail)
            @if($loop->first)
                <img src="{{$productDetail->product->img}}" class="img-fluid col-3" alt="product img">
                <h1>{{$productDetail->product->house->name}}
                    {{$productDetail->product->category->name}}
                    @if(!empty($productDetail->brandmodel->name))
                    {{$productDetail->product->brandmodel->name}}
                    @endif
                    <span> {{$productDetail->product->description}}</span>
                </h1>
            @endif()
        @endforeach
        @foreach($showProduct as $productDetail)
            <div class="justify-content-around col row">
                <div class="salesHeadBlock bg-warning">
                    <div class="d-inline-flex">
                        <i class="fa fa-archive fa-5x " aria-hidden="true"></i>
                    </div>
                    <div class="d-inline-flex">
                        <div>
                            <h3 class="supply">{{$productDetail->supply}}</h3>
                            <p>Supply</p>
                            @if(!empty($productDetail->size->size))
                                <p>Size: {{$productDetail->size->size}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="salesHeadBlock bg-info">
                    <div class="d-inline-flex">
                        <i class="fa fa-pie-chart fa-5x " aria-hidden="true"></i>
                    </div>
                    <div class="d-inline-flex">
                        <div>
                            <h3 class="">{{\App\order::where('warehouse_id','=',$productDetail->product_id)->sum('amount')}}</h3>
                            <p>Total Sold</p>
                        </div>
                    </div>
                </div>

                <div class="salesHeadBlock bg-info">
                    <div class="d-inline-flex">
                        <i class="fa fa-pie-chart fa-5x " aria-hidden="true"></i>
                    </div>
                    <div class="d-inline-flex">
                        <div>
                            <h3>{{$thisMonth}}</h3>
                            <p>This Month Sold</p>
                        </div>
                    </div>
                </div>
                <div class="salesHeadBlock bg-success">
                    <div class="d-inline-flex">
                        <i class="fa fa-line-chart fa-5x " aria-hidden="true"></i>
                    </div>
                    <div class="d-inline-flex">
                        <div>
                            <h3 class="price">€ {{number_format($thisMonth * $productDetail->price, 2, ',', ' ')}}</h3>
                            <p>This Month Profit</p>
                        </div>
                    </div>
                </div>
                <div class="salesHeadBlock bg-success">
                    <div class="d-inline-flex">
                        <i class="fa fa-line-chart fa-5x " aria-hidden="true"></i>
                    </div>
                    <div class="d-inline-flex">
                        <div>
                            <h3>€ {{number_format(\App\order::where('warehouse_id','=',$productDetail->product_id)->sum('amount')
                            *$productDetail->price, 2, ',', ' ')}}</h3>
                            <p>Total Profit</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script>

        const supply = document.getElementsByClassName('supply');
        const price = document.getElementsByClassName('price');


        setInterval( () => {

            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/json");

            var myInit = {
                method: 'GET',
                headers: myHeaders,
                mode: 'cors',
                cache: 'default' };

            var myRequest = new Request("<?php echo $urlId ?>", myInit);

            fetch(myRequest)
                .then( ( response ) => {
                    return response.json()
                }).then( ( objects ) => {
                console.log(objects)
                for(let i = 0; i < objects.showProduct.length; i++)
                {
                    supply[i].innerText = objects.showProduct[i].supply
                    price[i].innerHTML = "€  " + objects.showProduct[i].price.replace(".",",")


                }
            });

        },3000)


    </script>
@endsection