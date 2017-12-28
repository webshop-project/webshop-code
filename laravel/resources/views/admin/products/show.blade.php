<meta http-equiv="refresh" content="10">
@extends('layouts/adminMaster')
@section('title')
    Home
@endsection


@section('content')
    <div class="container">
        <h2>Sales Info</h2>
        @foreach($showProduct as $productDetail)
            @if($loop->first)
                <h1>{{$productDetail->product->house->name}}
                    {{$productDetail->product->category->name}}
                    {{$productDetail->product->brandmodel->name}}
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
                            <h3>{{$productDetail->supply}}</h3>
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
                            <h3>€ {{$thisMonth * $productDetail->price}}</h3>
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
                            <h3>€ {{\App\order::where('warehouse_id','=',$productDetail->product_id)->sum('amount')*$productDetail->price}}</h3>
                            <p>Total Profit</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection