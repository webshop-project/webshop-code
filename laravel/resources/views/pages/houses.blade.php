@extends('layouts/pagesMaster')

@section('title')
    Houses
@endsection

@section('content')
<div class="container">
    <div class="single-house row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="single-house-logo">
                <div class="single-house-top dragons-top"></div>
                <img src="../img/db_dragon_small.png" class="single-house-img img-responsive img-fluid" alt="">
                <div class="single-house-bottom dragons-bottom"></div>
            </div>
        </div>


        <div class="col-lg-6 col-md-12 col-sm-12 quote">
            <h2>Database Dragons</h2>
            <h3>Leave no table unjoined</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid aperiam autem consequatur dolores dolorum, eos et libero maiores nobis pariatur perspiciatis, placeat quasi rem repellendus sunt suscipit tenetur totam.</p>
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
                        <h5 class="d-inline pull-right seeMore">See More</h5>
                    </a>
                </div>
            </div>
            <div class="row headRoom justify-content-around">
                @for($i = 0; $i < 3; $i++)

                    <div class="product col-sm-12 col-md-4 col-4">
                        <a href="#">
                            <div class="">
                                <img class="img-responsive img-fluid bg-secondary rounded mx-auto d-block" src="../{{$products[$i]->image[0]->img}}" alt="">
                            </div>
                            <span class="text-dark">{{$products[$i]->name}}</span>
                            <span class="text-dark pull-right">{{$products[$i]->price}}</span>
                        </a>
                    </div>

                @endfor
            </div>
        </div>
    </div>

@endsection