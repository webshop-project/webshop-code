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
                                <a href="{{action('ProductController@edit', $product->id)}}"><button class="btn btn-info">Edit Product</button></a>
                                <form action="{{action('ProductController@destroy', $product->id)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <input type="hidden" name="delete" value="{{$product->id}}">
                                    <input class="btn btn-danger" type="submit" value="Delete Product">
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if (session('succes'))
                <div class="alert alert-success">
                    <h3>{{ session('succes') }}</h3>
                </div>
            @endif
            {{$products->links()}}
        </div>
    </div>
@endsection