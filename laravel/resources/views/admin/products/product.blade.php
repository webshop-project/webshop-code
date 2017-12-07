@extends('layouts.adminMaster')
@section('title')
    Home
@endsection


@section('content')
    <div class="container-fluid userinfo">
        <div class="container">
            <div class="container indexTitle col-12">
                <h2>PRODUCTS</h2>
            </div>
            <div class="row row-sizer-userinfo">
                @foreach($products as $product)

                    <div class="col-4 product-info">
                        <div class="item-info">
                            <div class="form-inline">
                                <div class="img-preview col-9"></div>
                                <div class="col-1">
                                    <p><b>price:</b></p>
                                    <p>{{$product->price}}</p>
                                    <p><b>stock:</b></p>
                                    <p>{{$product->supply}}</p>
                                    <p><b>name</b></p>
                                    <p>{{$product->name}}</p>
                                </div>
                                <div class="desc">{{$product->description}}
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-succes">Edit product</button>
                                <button class="btn btn-danger">Delete product</button>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                             {{$products->links()}}
                        </ul>
                    </nav>
            </div>
        </div>
    </div>
@endsection