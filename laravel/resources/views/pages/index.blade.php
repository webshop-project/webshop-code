@extends('layouts/pagesMaster')

@section('title')
Home
@endsection

@section('content')
    
<div class="container-fluid">
        <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide biggy" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <a href="/about">
                            <img class="d-block img-responsive img-fluid biggy" src="img/bannerfullhouse-slide.png" alt="First slide">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="{{action('ShopController@index')}}">
                            <img class="d-block img-responsive img-fluid biggy" src="img/dragons-slide.png" alt="Second slide">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="{{action('ShopController@index')}}">
                            <img class="d-block img-responsive img-fluid biggy" src="img/raven-slide.png" alt="Third slide">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="{{action('ShopController@index')}}">
                            <img class="d-block img-responsive img-fluid biggy" src="img/serpent-slide.png" alt="Fourth slide">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="{{action('ShopController@index')}}">
                            <img class="d-block img-responsive img-fluid biggy" src="img/viking-slide.png" alt="Fifth slide">
                        </a>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="row justify-content-around p-4 four-houses-container">
            <div class="four-houses">
                <div class="four-houses-logo dragon">
                    <a href="{{action('HouseController@show', 2)}}">
                        <div class="four-houses-top"></div>
                            <img src="img/db_dragon_xs.png" class="img-responsive img-fluid center" alt="">
                        <div class="four-houses-bottom"></div>
                    </a>
                </div>
            </div>
            <div class="four-houses">
                <div class="four-houses-logo raven">
                    <a href="{{action('HouseController@show', 3)}}">
                        <div class="four-houses-top"></div>
                            <img src="img/rave_xs.png" class="img-responsive img-fluid center" alt="">
                        <div class="four-houses-bottom"></div>
                    </a>
                </div>
            </div>
            <div class="four-houses">
                <div class="four-houses-logo serpent">
                    <a href="{{action('HouseController@show', 4)}}">
                        <div class="four-houses-top"></div>
                            <img src="img/script_serpents_xs.png" class="img-responsive img-fluid center" alt="">
                        <div class="four-houses-bottom"></div>
                    </a>
                </div>
            </div>
            <div class="four-houses">
                <div class="four-houses-logo viking">
                    <a href="{{action('HouseController@show', 1)}}">
                        <div class="four-houses-top"></div>
                            <img src="img/viking_xs.png" class="img-responsive img-fluid center" alt="">
                        <div class="four-houses-bottom"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="new-products p-5">
        <div class="container">
            <div class="row p-3">
                <div class="col col-xs-12">
                    <h2 class="d-inline newProducts">Nieuwe Producten</h2>
                </div>
                <div class="col">
                    <a href="{{action('ShopController@index')}}">
                        <h5 class="d-inline pull-right seeMore col-xs-12">See More</h5>
                    </a>
                </div>
            </div>
            <div class="row headRoom">
                @for($i = 0; $i < 3; $i++)
                    <div class="col-4 product">
                        <a href="{{action('WarehouseController@show', $products[$i]->id)}}">
                            <div class="col-12">
                                <img class="img-responsive img-fluid bg-secondary rounded mx-auto d-block" src="{{$products[$i]->img}}" alt="">
                            </div>
                            <div class="row justify-content-between p-2">
                                <span class="col-9 text-dark">{{$products[$i]->category->name}} - {{$products[$i]->house->name}}</span>
                                <span class="text-dark">{{$products[$i]->price}}</span>
                            </div>
                        </a>
                    </div>
                @endfor
            </div>
        </div>
    </div>
<script>
    if (typeof(Storage) !== "undefined") {
        // Code for localStorage/sessionStorage.
    } else {
        // Sorry! No Web Storage support..
    }
</script>
@endsection