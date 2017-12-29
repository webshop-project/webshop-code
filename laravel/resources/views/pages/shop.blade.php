@extends('layouts/pagesMaster')

@section('title')
    Shop
@endsection

@section('content')

    <div class="container d-inline">
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
                    <div class="row">
                        @foreach($products as $product)
                            <div class="block span3">
                                <div class="product">
                                        <img src="{{$product->img}}" alt="{{$product->house->name}} {{$product->category->name}}">
                                    <div class="buttons">
                                        <a class="preview btn btn-large btn-info" href="#"><i class="glyphicon glyphicon-eye-open"></i> View item</a>
                                    </div>
                                </div>
                                <div class="info">
                                    <h4>{{$product->house->name}}<br> {{$product->category->name}}</h4>
                                    <span class="price">€{{$product->price}}</span>
                                    <form action="{{ url('/shop/cart') }}" method="POST">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <input type="hidden" name="name" value="{{$product->house->name}} {{$product->category->name}}">
                                        <input type="hidden" name="size" value="">
                                        <input type="hidden" name="price" value="">
                                        <input type="submit" class="btn btn-info pull-right" value="Add to Cart">
                                    </form>
                                </div>
                            </div>
                        @endforeach
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
    </div>


@endsection