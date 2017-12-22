@extends('layouts/pagesMaster')

@section('title')
    Detail
@endsection

@section('content')

{{--<div class="jumbotron bg-danger">--}}
        {{--<div class="container">--}}
            {{--<h1 class="text-white">--}}
                {{--Banner--}}
            {{--</h1>--}}
        {{--</div>--}}
    {{--</div>--}}
{{Breadcrumbs::render('product', $product)}}
    <div class="container details p-5">
        <div class="row p-5">
            <div class="col-6 row justify-content-center">
                <img class="img-responsive" src="{{$product[0]->img}}" alt="Product image">
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 p-5">
                <table class="table">
                    <tbody>
                    <tr class="row ">
                        <td class="col-5">Name:</td>
                        <td class="col-7">{{$product[0]->category->name}} - {{$product[0]->house->name}}</td>
                    </tr>
                    @if($product[0]->category->id == 5 || $product[0]->category->id == 6)
                        <tr class="row justify-content-between">
                            <td class="col-5">Size:</td>
                            <td class="col-7 ">
                                @foreach($sizes as $size)
                                    <span class="col-4">{{$size}}</span>
                                @endforeach
                            </td>
                        </tr>
                    @endif
                    <tr class="row justify-content-around">
                        <td class="col-5">Price:</td>
                        <td class="col-7">{{$product[0]->price}}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="btn-group" role="group">
                    <button type="button" class="btn bg-danger btn-danger">
                        <i class="fa fa-cart-plus fa-2x" aria-hidden="true"></i>
                        </button>
                    <a class="btn bg-danger btn-danger" href="http://hrefshare.com/64c3e">
                        <i class="fa fa-share-alt fa-2x" aria-hidden="true"></i>
                    </a>
                    <button type="button" class="btn bg-danger btn-danger">
                        <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                    </button>

                </div>
            </div>
        </div>
        <hr>
        <div class="p-5">
            <h2>Beschrijving</h2>
            <p>{{$product[0]->description}}</p>
        </div>
        <div class="row headRoom">
            @for($i = 0; $i < 3; $i++)

                <div class="product col-sm-12 col-md-4 col-4 p-4">
                    <a href="{{action('WarehouseController@show', $relatedProducts[$i]->product_id)}}">
                        <div class="row align-items-center">
                            <img class="img-responsive img-fluid mx-auto d-block" src="{{$relatedProducts[$i]->img}} " alt="">
                        </div>
                        <div class="row justify-content-between p-2">
                            <span class="col-10 text-dark">{{$relatedProducts[$i]->category->name}} - {{$relatedProducts[$i]->house->name}}</span>
                            <span class="text-dark">{{$relatedProducts[$i]->price}}</span>
                        </div>
                    </a>
                </div>

            @endfor
        </div>

    </div>
@endsection