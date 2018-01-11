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
                            <h3 class="supply"></h3>
                            <p>Supply</p>
                            <p class="size"></p>
                        </div>
                    </div>
                </div>
                <div class="salesHeadBlock bg-info">
                    <div class="d-inline-flex">
                        <i class="fa fa-pie-chart fa-5x " aria-hidden="true"></i>
                    </div>
                    <div class="d-inline-flex">
                        <div>
                            <h3 class="totalSold"></h3>
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
                            <h3 class="thisMonthSold"></h3>
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
                            <h3 class="thisMonthProfit"></h3>
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
                            <h3 class="totalProfit"></h3>
                            <p>Total Profit</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script>

        const supply            = document.getElementsByClassName('supply');
        const size              = document.getElementsByClassName('size');
        const totalSold         = document.getElementsByClassName('totalSold');
        const thisMonthSold     = document.getElementsByClassName('thisMonthSold');
        const thisMonthProfit   = document.getElementsByClassName('thisMonthProfit');
        const totalProfit       = document.getElementsByClassName('totalProfit');

        setInterval( () => {

            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/json");

            var myInit = {
                method:     'GET',
                headers:    myHeaders,
                mode:       'cors',
                cache:      'default' };

            var myRequest = new Request("<?php echo 'http://localhost:8000/api/sales/'.$urlId ?>", myInit);

            fetch(myRequest)
                .then( ( response ) => {
                    return response.json()
                }).then( ( objects ) => {
                for(let i = 0; i < objects.length; i++)
                {
                    supply[i].innerHTML         = objects[i].supply;
                    if(objects[i].size)
                    {
                        size[i].innerHTML           = 'Size '+ objects[i].size;
                    }
                    totalSold[i].innerHTML      = objects[i].totalSold;
                    thisMonthSold[i].innerHTML  = objects[i].totalSoldThisMonth;
                    thisMonthProfit[i].innerHTML= '€ ' + objects[i].totalProfitThisMonth.toFixed(2).replace(".",',');
                    totalProfit[i].innerHTML    = '€ ' + objects[i].totalProfit.toFixed(2).replace(".",',');
                }
                })
        },3000)


    </script>
@endsection