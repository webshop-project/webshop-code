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
                                <div class="img-preview col-9">
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner" role="listbox">
                                            @foreach($images as $image)
                                                <div style="width: 100%" class="carousel-item">
                                                    <img class="d-block img-fluid" src="{{$image->img}}" alt="First slide">
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                           data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                           data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
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
                            <div class="row text-center">
                                <div class="col-3"></div>
                                <a href="{{action('ProductController@edit', $product->id)}}">
                                    <button class="btn btn-info" style="margin-right: 5px">Edit Product</button>
                                </a>
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
            @elseif (session('succesD'))
                <div class="alert alert-success">
                    <h3>{{ session('succesD') }}</h3>
                </div>

            @endif
            {{$products->links()}}
        </div>
    </div>

@endsection