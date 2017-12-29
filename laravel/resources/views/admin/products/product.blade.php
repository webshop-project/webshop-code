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
                                <div class="img-preview">
                                    <img class="img-fluid" src="{{$product->product->img}}" alt="img">
                                </div>
                                <div class="col-1">
                                    <p><b>price:</b></p>
                                    <p>{{$product->price}}</p>
                                    <p><b>stock:</b></p>
                                    <p>{{$product->supply}}</p>
                                </div>
                                <div class="desc">{{$product->description}}
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-3"></div>
                                <a href="{{action('WarehouseController@edit', $product->product_id)}}">
                                    <button class="btn btn-info" style="margin-right: 5px">Edit Product</button>
                                </a>
                                <form action="{{action('WarehouseController@destroy', $product->product_id)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <input type="hidden" name="delete" value="{{$product->product_id}}">
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
            @elseif (session('succesD'))
                <div class="alert alert-success">
                    <h3>{{ session('succesD') }}</h3>
                </div>
            @endif
            {{$products->links()}}
        </div>
    </div>

@endsection