@extends('layouts/pagesMaster')

@section('title')
    Detail
@endsection

@section('content')
    {{Breadcrumbs::render('product', $product)}}
    <div class="container details p-5">
        <div class="row p-5">
            <div class="detail-img-choice img-fluid col-lg-1 col-md-3 col-sm-4 d-none d-sm-block d-md-block d-lg-block d-xl-block p-2">
                <img id="img-front-choice" class="img-fluid" src="{{$product->img}}" alt="Product image">
                <img id="img-back-choice"  class="img-fluid" src="{{$product->image[0]->img}}" alt="Product img">
            </div>
            <div class="row justify-content-center detail-img col-lg-5 col-md-8 col-sm-6">
                <div class="p-5">
                    <img id="img-front" class="img-fluid" src="{{$product->img}}" alt="Product image">
                    <img id="img-back" class="img-fluid" src="{{$product->image[0]->img}}" alt="Product image">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 p-3">
                <table class="table">
                    <tbody>
                    <tr class="row">
                        <td class="col-5">Name:</td>
                        <td class="col-7">{{$product->category->name}} - {{$product->house->name}}</td>
                    </tr>
                    @if($product->category->id == 5 || $product->category->id == 6)
                        <tr class="row justify-content-between">
                            <td class="col-5">Size:</td>
                            <td class="col-7 ">
                                @foreach($product->warehouse as $warehouse)
                                    <span class="col-4">{{$warehouse->size->size}}</span>
                                @endforeach
                            </td>
                        </tr>
                    @elseif($product->category->id == 4)
                        <tr>
                            <td class="col-5">Model:</td>
                        </tr>
                        @foreach($models as $model)
                            <tr class="row justify-content-between">
                                <td class="col-12">
                                    <span class="">{{$model->brandModel->brand->name}} - {{$model->brandModel->name}}</span>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    <tr class="row justify-content-around">
                        <td class="col-5">Price:</td>
                        @foreach($product->warehouse as $price)
                            @if($loop->first)
                                <td class="col-7">{{number_format($price->price, 2, ',', ' ')}}</td>
                            @endif
                        @endforeach
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
            <h4>{{$product->description}}</h4>
        </div>
        <div class="new-products">
            <div class="row p-3">
                <div class="col col-xs-12">
                    <h2 class="d-inline newProducts">Gerelateerde Producten</h2>
                </div>
                <div class="col">
                    <a href="{{action('ShopController@index')}}">
                        <h5 class="d-inline pull-right seeMore">See More</h5>
                    </a>
                </div>
            </div>
            <div class="row headRoom">
                @for($i = 0; $i < 3; $i++)
                    <div class="product col-sm-12 col-md-4 col-4 p-4">
                        <a href="{{action('WarehouseController@show', $relatedProducts[$i]->id)}}">
                            <div class="row align-items-center">
                                <img class="img-responsive img-fluid mx-auto d-block" src="{{$relatedProducts[$i]->img}} " alt="">
                            </div>
                            <div class="row justify-content-between p-2">
                                <span class="col-9 text-dark">{{$relatedProducts[$i]->category->name}} - {{$relatedProducts[$i]->house->name}}</span>
                                <span class="text-dark">{{$relatedProducts[$i]->warehouse[0]->price}}</span>
                            </div>
                        </a>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection