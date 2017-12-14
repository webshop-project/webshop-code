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
                    <a href="">
                        <div class="four-houses-top"></div>
                            <img src="img/db_dragon_xs.png" class="img-responsive img-fluid center" alt="">
                        <div class="four-houses-bottom"></div>
                    </a>
                </div>
            </div>
            <div class="four-houses">
                <div class="four-houses-logo raven">
                    <a href="">
                        <div class="four-houses-top"></div>
                            <img src="img/rave_xs.png" class="img-responsive img-fluid center" alt="">
                        <div class="four-houses-bottom"></div>
                    </a>
                </div>
            </div>
            <div class="four-houses">
                <div class="four-houses-logo serpent">
                    <a href="">
                        <div class="four-houses-top"></div>
                            <img src="img/script_serpents_xs.png" class="img-responsive img-fluid center" alt="">
                        <div class="four-houses-bottom"></div>
                    </a>
                </div>
            </div>
            <div class="four-houses">
                <div class="four-houses-logo viking">
                    <a href="">
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
                    <a href="#">
                        <h2 class="d-inline newProducts">New Products</h2>
                    </a>
                </div>
                <div class="col">
                    <a href="#">
                        <h5 class="d-inline pull-right seeMore col-xs-12">See More</h5>
                    </a>
                </div>
            </div>
            <div class="row headRoom">
                <div class="col">
                    <a href="#">
                        <img class="img-responsive img-fluid bg-secondary" src="img/front_big_dragon.png" alt="">
                        <span class="text-dark">Dragon T-shirt</span>
                        <span class="text-dark pull-right">€24,99</span>
                    </a>
                </div>
                <div class="col">
                    <a href="#">
                        <img class="img-responsive img-fluid bg-secondary" src="img/front_big_raven.png" alt="">
                        <span class="text-dark">Raven T-shirt</span>
                        <span class="text-dark pull-right">€24,99</span>
                    </a>
                </div>
                <div class="col">
                    <a href="#">
                        <img class="img-responsive img-fluid bg-secondary" src="img/front_big_serpent.png" alt="">
                        <span class="text-dark">Serpent T-shirt</span>
                        <span class="text-dark pull-right pb-5">€24,99</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection