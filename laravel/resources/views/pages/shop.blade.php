@extends('layouts/pagesMaster')

@section('title')
    Shop
@endsection

@section('content')

    <div class="container">
        <div class="d-flex">
            <div class="container col-sm-12 col-xs-12 col-md-2">
                <div class="row">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{url('/shop/caps')}}">Caps</a></li>
                        <li class="list-group-item"><a href="{{url('/shop/keycords')}}">Keycords</a></li>
                        <li class="list-group-item"><a href="{{url('/shop/mugs')}}">Mugs</a></li>
                        <li class="list-group-item"><a href="{{url('/shop/phonecases')}}">Phonecases</a></li>
                        <li class="list-group-item"><a href="{{url('/shop/shirts')}}">Shirts</a></li>
                        <li class="list-group-item"><a href="{{url('/shop/usbs')}}">USB's</a></li>
                    </ul>
                </div>
            </div>
            <div class="container col-10 col-sm-12 col-xs-12">
                <div class="row">
                    @if (session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                    @endif

                    @if (session()->has('error_message'))
                        <div class="alert alert-danger">
                            {{ session()->get('error_message') }}
                        </div>
                    @endif
                    <select name="selectHouse" title="selectHouse" class="custom-select">
                        <option selected disabled> Houses:</option>
                        <option value="dragons">Database Dragons</option>
                        <option value="ravens">Recursive Ravens</option>
                        <option value="serpents">Script Serpents</option>
                        <option value="vikings">Variable Vikings</option>
                    </select>
                </div>
                <div class="justify-content-between">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="d-inline-flex col-md-3 col-sm-12 col-xs-12">
                                <div class="salesHeadBlock bg-warning">
                                    <div class="d-inline-flex">
                                        <h3>{{$product->house->name}}
                                            {{$product->category->name}}
                                        </h3>
                                    </div>
                                    <div class="d-inline-flex">
                                        <div>
                                            <img src="{{$product->img}}" class="img-fluid" alt="img">
                                        </div>
                                    </div>
                                    <div class="d-inline-flex">
                                        <p>
                                            {{$product->description}}
                                        </p>
                                        <p>
                                            @foreach($product->warehouse as $price)
                                                @if($loop->first)
                                                    {{$price->price}} -
                                                @endif
                                                @if($loop->last)
                                                    {{$price->price}}
                                                @endif
                                            @endforeach
                                        </p>
                                    </div>
                                    <a class="btn btn-primary" href="{{action('CartController@index')}}">Add2Cart</a>
                                    <a class="btn btn-primary" href="{{action('CartController@index')}}">Add2Star</a>
                                </div>
                            </div>
                        @endforeach
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
