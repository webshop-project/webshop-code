@extends('layouts/pagesMaster')

@section('title')
    Shop
@endsection




@section('content')

    {{Breadcrumbs::render('shop')}}
    <div class="container d-inline">
        <div class="container">
            <div class="row">
                <div class=" col menuList">
                    <h4>Categories</h4>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="filter-cap">
                                <input type="checkbox" value="None" id="filter-cap" name="check" checked/>
                                <label for="filter-cap"></label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="filter-keycord">
                                <input type="checkbox" value="None" id="filter-keycord" name="check" checked/>
                                <label for="filter-keycord"></label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="filter-mug">
                                <input type="checkbox" value="None" id="filter-mug" name="check" checked/>
                                <label for="filter-mug"></label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="filter-phonecase">
                                <input type="checkbox" value="None" id="filter-phonecase" name="check" checked/>
                                <label for="filter-phonecase"></label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="filter-shirt">
                                <input type="checkbox" value="None" id="filter-shirt" name="check" checked/>
                                <label for="filter-shirt"></label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="filter-usb">
                                <input type="checkbox" value="None" id="filter-usb" name="check" checked/>
                                <label for="filter-usb"></label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="container col-xs-12 col-sx-12 col-10  d-inline">
                    <div class="selectContainer">
                        <select name="houses" id="houses" class="select">
                            <option value="0">All Houses</option>
                            <option value="1">Variable Vikings</option>
                            <option value="2">Database Dragons</option>
                            <option value="3">Recursive Ravens</option>
                            <option value="4">Script Serpents</option>
                        </select>
                    </div>
                    <div class="row">
                        @foreach($products as $product)
                            <div class="category{{$product->category->id}} display-block">
                                <div class="house{{$product->house->id}} display-block">
                                    <div class="block span3">
                                        <div class="product d-flex justify-content-center">
                                            <img src="{{$product->img}}"
                                                 alt="{{$product->house->name}} {{$product->category->name}}">
                                            <div class="buttons">
                                                <a class="preview btn btn-large btn-info"
                                                   href="{{action('WarehouseController@show',$product->id)}}"><i
                                                            class="glyphicon glyphicon-eye-open"></i> View item</a>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <h4 onclick="count({{$product->id}})">{{$product->house->name}}
                                                <br> {{$product->category->name}}
                                                @if(!empty($product->brandModel->name))
                                                    {{$product->brandModel->name}}
                                                @endif
                                            </h4>
                                            @foreach($product->warehouse as $price)
                                                @if($loop->first)
                                                    <span class="price">€{{number_format($price->price,2,',',' ')}}</span>
                                                @endif
                                            @endforeach
                                            <form action="{{ url('/shop/cart') }}" method="POST">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$product->id}}">
                                                <input type="hidden" name="name" value="{{$product->house->name}} {{$product->category->name}}">
                                                <input type="hidden" name="qty" value="{{$product->size}}">
                                                <input type="hidden" name="price" value="{{$product->warehouse[0]->price}}">
                                                <input type="submit" class="btn btn-info pull-right" value="Add to Cart">

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/jQuery-3.2.1.js')}}"></script>
    <script src="{{asset('js/filterShop.js')}}"></script>

@endsection