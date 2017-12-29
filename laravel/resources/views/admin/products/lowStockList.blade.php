@extends('layouts/adminMaster')
@section('title')
    LowStockList
@endsection


@section('content')
    <div class="container">
        <div class="row d-flex">
            @foreach($lowOnStock as $lowStock)
                <div class="col-sm-4 product-info">
                    <div class="item-info">
                        <div class="form-inline row d-flex">
                                <div class="img-preview col-9">
                                    <img width="90%" height="90%"  src="{{$lowStock->product->img}}" alt="">
                                </div>
                                <div class="col-1">
                                    <p><b>Name:</b></p>
                                    <p><b>{{$lowStock->product->house->name}}</b></p>
                                    <p><b>{{$lowStock->product->category->name}}</b></p>
                                    <p><b>Stock:</b></p>
                                    <p><b>{{$lowStock->supply}}</b></p>
                                    <div class="list-item">
                                        <a class="btn btn-warning" href="{{action('DashboardController@show',$lowStock->product->id)}}">Show</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
        {{$lowOnStock->links()}}
    </div>
@endsection