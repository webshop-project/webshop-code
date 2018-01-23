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
                <img id="img-back-choice" class="img-fluid" src="{{$product->image[0]->img}}" alt="Product img">
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
                        <td class="col-7">{{$product->house->name}} {{$product->category->name}}</td>
                    </tr>
                    @if($product->category->id == 5 || $product->category->id == 6)
                        <tr class="row justify-content-between">
                            <td class="col-5">Size:</td>
                            <td class="col-7 ">
                                <form action="{{ url('/shop/cart') }}" method="POST">
                                    {{csrf_field()}}
                                    <select name="size" id="sizeAndPrice" class="btn btn-info">
                                        <option disabled selected>-- Select A Size --</option>
                                        @foreach($product->warehouse as $warehouse)
                                            @if($warehouse->supply != 0)
                                                <option name="price" value="{{$warehouse->size->size}}">{{$warehouse->size->size}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <input type="hidden" name="name" value="{{$product->house->name}} {{$product->category->name}}">
                                    <input type="submit" class="btn btn-info pull-right" value="Add to Cart">
                                </form>
                            </td>
                        </tr>
                    @elseif($product->category->id == 4)
                        <tr>
                            <td class="col-5">Model:</td>
                        </tr>
                        @foreach($models as $model)
                            <tr class="row justify-content-between">
                                <td class="col-12">
                                    <span class="">{{$model->brandModel->brand->name}}
                                        - {{$model->brandModel->name}}</span>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    <tr class="row justify-content-around">
                        <td class="col-5">Price:</td>
                        <td class="col-7 select-size">Select a size.</td>
                        @if($product->warehouse[0] && $product->warehouse[0]->supply !=0)
                            <td class="col-7 size-small d-none">
                                €{{number_format($product->warehouse[0]->price, 2, ',', ' ')}}</td>
                        @endif
                        @if($product->warehouse[1] && $product->warehouse[1]->supply !=0)
                            <td class="col-7 size-medium d-none">
                                €{{number_format($product->warehouse[1]->price, 2, ',', ' ')}}</td>
                        @endif
                        @if($product->warehouse[2] && $product->warehouse[2]->supply !=0)
                            <td class="col-7 size-large d-none">
                                €{{number_format($product->warehouse[2]->price, 2, ',', ' ')}}</td>
                        @endif
                        @if($product->warehouse[3] && $product->warehouse[3]->supply !=0)
                            <td class="col-7 size-extra-large d-none">
                                €{{number_format($product->warehouse[3]->price, 2, ',', ' ')}}</td>
                        @endif
                    </tr>
                    </tbody>
                </table>
                <div class="btn-group" role="group">
                    {{--<form action="{{ url('/shop/cart') }}" method="POST">--}}
                        {{--{{csrf_field()}}--}}
                        {{--<input type="hidden" name="id" value="{{$product->id}}">--}}
                        {{--<input type="hidden" name="name" value="{{$product->house->name}} {{$product->category->name}}">--}}
                        {{--<input type="hidden" name="price" value="">--}}
                        {{--<input type="hidden" name="size" value="">--}}
                        {{--<input type="submit" class="btn btn-info pull-right" value="Add to Cart">--}}
                    {{--</form>--}}
                </div>
            </div>
        </div>
        <hr>
        <div class="p-5">
            <h2>Description</h2>
            <h4>{{$product->description}}</h4>
        </div>
        <div class="new-products">
            <div class="row p-3">
                <div class="col col-xs-12">
                    <h2 class="d-inline newProducts">Related Products</h2>
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
                                <img class="img-responsive img-fluid mx-auto d-block"
                                     src="{{$relatedProducts[$i]->img}} " alt="">
                            </div>
                            <div class="row justify-content-between p-2">
                                <span class="col-9 text-dark">{{$relatedProducts[$i]->category->name}}
                                    - {{$relatedProducts[$i]->house->name}}</span>
                                <span class="text-dark">{{$relatedProducts[$i]->warehouse[0]->price}}</span>
                            </div>
                        </a>
                    </div>
                @endfor
            </div>
        </div>
    </div>
    <script src="{{asset('js/sizesFilter.js')}}"></script>
@endsection