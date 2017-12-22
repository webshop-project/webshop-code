@extends('layouts/adminMaster')
@section('title')
    Home
@endsection


@section('content')
    <div class="container-fluid userinfo">
        <div class="container">
            <div class="container indexTitle col-12">
                <h2>GLOBAL INFORMATION</h2>
            </div>
            <div class="row row-sizer-userinfo">
                <div class="col-lg-2"></div>
                <div class="item col-lg-2 col-md-3">
                    <div class="item-info text-center">
                        <span>Amount Of Products</span>
                        <div class="mw-100"></div>
                        <i class="fa fa-shopping-bag justified-content-center" aria-hidden="true"></i>
                        <div class="mw-100"></div>
                        {{--<span>{{$productsCount}}</span>--}}
                    </div>
                </div>
                <div class="item col-lg-2 col-md-3">
                    <div class="item-info text-center">
                        <span>Amount Of Users</span>
                        <div class="mw-100"></div>
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <div class="mw-100"></div>
                        {{--<span>{{$usersCount}}</span>--}}
                    </div>
                </div>
                <div class="item col-lg-2 col-md-3">
                    <div class="item-info text-center">
                        <span>Amount Of Orders</span>
                        <div class="mw-100"></div>
                        <i class="fa fa-barcode" aria-hidden="true"></i>
                        <div class="mw-100"></div>
                        {{--<span>{{$ordersCount}}</span>--}}
                    </div>
                </div>
                <div class="item col-lg-2 col-md-3">
                    <div class="item-info text-center">
                        <span>Total Vouchers Used</span>
                        <div class="mw-100"></div>
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        <div class="mw-100"></div>
                        {{--<span>{{$vouchersCount}}</span>--}}
                    </div>
                </div>
            </div>
            <div class="d-inline">
                <div class="alert alert-danger" role="alert">
                    <p class="d-inline">There are  <span class="badge badge-warning badge-pill">{{$lowOnStock}}</span>
                        products low on stock!</p>
                    <a class="btn btn-warning d-inline" href="{{action('DashboardController@lowStockList') }}">Click me!</a>
                </div>
            </div>

            <div class="container indexTitle col-12">
                <h2>MOST POPULAR CLOTHING</h2>
            </div>
            <div class="row row-sizer-userinfo">
                {{--@foreach($products as $product)--}}
                    <div class="col-4 product-info">
                        <div class="item-info">
                            <div class="form-inline">
                                <div class="img-preview col-9">
                                    {{--<img width="90%" src="{{$product->img}}" alt="">--}}
                                </div>
                                <div class="col-1">
                                    <p><b>price:</b></p>
                                    {{--<p>{{$product->price}}</p>--}}
                                    <p><b>stock:</b></p>
                                    {{--<p>{{$product->supply}}</p>--}}
                                    <p><b>name</b></p>
                                    {{--<p>{{$product->name}}</p>--}}
                                </div>
                                {{--<div class="desc">{{$product->description}}--}}
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-3"></div>
                                {{--<a href="{{action('ProductController@edit', $product->id)}}">--}}
                                    <button class="btn btn-info" style="margin-right: 5px">Edit Product</button>
                                {{--</a>--}}
                                {{--<form action="{{action('ProductController@destroy', $product->id)}}" method="post">--}}
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    {{--<input type="hidden" name="delete" value="{{$product->id}}">--}}
                                    <input class="btn btn-danger" type="submit" value="Delete Product">
                                {{--</form>--}}
                            </div>
                        </div>
                    </div>
                {{--@endforeach--}}
            </div>
{{--            {{$products->links()}}--}}

            <div class="container indexTitle col-12">
                <h2>LOW ON STOCK</h2>
            </div>
            <div class="row row-sizer-userinfo">
                {{--@foreach($productsLow as $productLow)--}}
                    <div class="col-4 product-info">
                        <div class="item-info">
                            <div class="form-inline">
                                <div class="img-preview col-9">
                                    {{--<img width="90%" src="{{$product->img}}" alt="">--}}
                                </div>
                                <div class="col-1">
                                    <p><b>price:</b></p>
                                    {{--<p>{{$productLow->price}}</p>--}}
                                    <p><b>stock:</b></p>
                                    {{--<p>{{$productLow->supply}}</p>--}}
                                    <p><b>name</b></p>
                                    {{--<p>{{$productLow->name}}</p>--}}
                                </div>
                                {{--<div class="desc">{{$productLow->description}}--}}
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-3"></div>
                                {{--<a href="{{action('ProductController@edit', $productLow->id)}}">--}}
                                    <button class="btn btn-info" style="margin-right: 5px">Edit Product</button>
                                {{--</a>--}}
                                {{--<form action="{{action('ProductController@destroy', $productLow->id)}}" method="post">--}}
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    {{--<input type="hidden" name="delete" value="{{$productLow->id}}">--}}
                                    <input class="btn btn-danger" type="submit" value="Delete Product">
                                {{--</form>--}}
                            </div>
                        </div>
                    </div>
                {{--@endforeach--}}
            </div>
{{--            {{$productsLow->links()}}--}}

            <div class="container indexTitle col-12">
                <h2>MOST LOGINS FROM HOUSES</h2>
            </div>
            <div class="row row-sizer-userinfo">
                <div class="col-lg-2"></div>
                <div class="item col-lg-2 col-md-3">
                    <div class="item-info text-center">
                        <span>Login Ravens</span>
                        <div class="mw-100"></div>
                        <i class="fa fa-paper-plane justified-content-center" aria-hidden="true"></i>
                        <div class="mw-100"></div>
                        <span>0</span>
                    </div>
                </div>
                <div class="item col-lg-2 col-md-3">
                    <div class="item-info text-center">
                        <span>Login Vikings</span>
                        <div class="mw-100"></div>
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        <div class="mw-100"></div>
                        <span>0</span>
                    </div>
                </div>
                <div class="item col-lg-2 col-md-3">
                    <div class="item-info text-center">
                        <span>Login Dragons</span>
                        <div class="mw-100"></div>
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        <div class="mw-100"></div>
                        <span>0</span>
                    </div>
                </div>

                <div class="item col-lg-2 col-md-3">
                    <div class="item-info text-center">
                        <span>Login Serpents</span>
                        <div class="mw-100"></div>
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        <div class="mw-100"></div>
                        <span>0</span>
                    </div>
                </div>
            </div>
        {{--</div>--}}
    {{--</div>--}}
@endsection