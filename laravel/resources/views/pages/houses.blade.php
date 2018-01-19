@extends('layouts/pagesMaster')

@section('title')
    Houses
@endsection

@section('content')
{{Breadcrumbs::render('house', $house)}}

<div class="container">
    <div class="single-house row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="single-house-logo">

                <div class="single-house-top @if($house->id == 1) vikings-top @elseif($house->id == 2) dragons-top @elseif($house->id == 3) ravens-top @elseif($house->id == 4) serpents-top @endif"></div>
                <img src="@if($house->id == 1) ../img/viking_small.png @elseif($house->id == 2) ../img/db_dragon_small.png @elseif($house->id == 3) ../img/rave_small.png @elseif($house->id == 4) ../img/script_serpents_small.png @endif" class="single-house-img img-responsive img-fluid" alt="">
                <div class="single-house-bottom @if($house->id == 1) vikings-bottom @elseif($house->id == 2) dragons-bottom @elseif($house->id == 3) ravens-bottom @elseif($house->id == 4) serpents-bottom @endif"></div>

            </div>
        </div>


        <div class="col-lg-6 col-md-12 col-sm-12 quote p-2">
            <h2>{{$house->name}}</h2>
            <h3></h3>
            <h4>{{$house->description}}</h4>
        </div>
    </div>
</div> 
<div class="new-products p-5">
        <div class="container">
            <div class="row p-3">
                <div class="col col-xs-12">
                    <h2 class="d-inline newProducts">New products</h2>
                </div>
                <div class="col">
                    <a href="{{action('ShopController@index')}}">
                        <h5 class="d-inline pull-right seeMore">See More</h5>
                    </a>
                </div>
            </div>
            <div class="row headRoom justify-content-around">
                @for($i = 0; $i < 3; $i++)
                    <div class="product col-sm-12 col-md-4 col-4">
                        <a href="{{action('WarehouseController@show', $products[$i]->id)}}">
                            <div class="">
                                <img class="img-responsive img-fluid bg-secondary rounded mx-auto d-block" src="{{$products[$i]->image[0]->img}} " alt="">
                            </div>
                            <div class="row justify-content-between p-2">
                                <span class="col-9 text-dark">{{$products[$i]->category->name}} - {{$products[$i]->house->name}}</span>
                                <span class="text-dark">{{$products[$i]->warehouse[0]->price}}</span>
                            </div>
                        </a>
                    </div>

                @endfor
            </div>
        </div>
    </div>

@endsection