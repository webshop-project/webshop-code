@extends('layouts/pagesMaster')

@section('title')
    Shop
@endsection

@section('content')

    <div class="container d-inline">
        <div class="col">
            <div class="row">
                <div class=" col menuList">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{url('/shop/caps')}}">Caps</a></li>
                        <li class="list-group-item"><a href="{{url('/shop/keycords')}}">Keycords</a></li>
                        <li class="list-group-item"><a href="{{url('/shop/mugs')}}">Mugs</a></li>
                        <li class="list-group-item"><a href="{{url('/shop/phonecases')}}">Phonecases</a></li>
                        <li class="list-group-item"><a href="{{url('/shop/shirts')}}">Shirts</a></li>
                        <li class="list-group-item"><a href="{{url('/shop/usbs')}}">USB's</a></li>
                    </ul>
                </div>
                <div class="container col-xs-12 col-sx-12 col-10  d-inline">
                    <div class="selectContainer">
                        <select class="custom-select">
                            <option selected disabled> Houses:</option>
                            <option value="dragons">Database Dragons</option>
                            <option value="ravens">Recursive Ravens</option>
                            <option value="serpents">Script Serpents</option>
                            <option value="vikings">Variable Vikings</option>
                        </select>
                    </div>
                    <div class="wd-100"></div>
                    <div class="row headRoom">

                        {{--@php--}}
                        {{--dd($products);--}}
                        {{--@endphp--}}
                        @foreach($products as $product)
                            <div class="col-md-3 col-6 headRoom">
                                <form method="_POST" action="{{action('ShopController@add')}}">
                                    <a href="/shop/{{$product->name}}">
                                        <img src="{{$product->img}}" class="img-fluid img-responsive"
                                             alt="{{$product->name}}">
                                        <h6>{{$product->name}}</h6>
                                    </a>
                                    <span>€{{$product->price}}</span>
                                    <select class="btn-mini" name="size">
                                        <option value="1">S</option>
                                        <option value="2">M</option>
                                        <option value="3">L</option>
                                        <option value="4">XL</option>
                                    </select>
                                    <button class="btn-primary" style="cursor:pointer" type="submit" name="add-to-cart">Add To Cart</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection