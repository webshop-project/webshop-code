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
                        <li class="list-group-item"><input type="checkbox" class="cbx-cap" checked>Caps</li>
                        <li class="list-group-item"><input type="checkbox" class="cbx-keycord" checked>Keycords</li>
                        <li class="list-group-item"><input type="checkbox" class="cbx-mug" checked>Mugs</li>
                        <li class="list-group-item"><input type="checkbox" class="cbx-phonecase" checked>Phonecases</li>
                        <li class="list-group-item"><input type="checkbox" class="cbx-shirt" checked>Shirts</li>
                        <li class="list-group-item"><input type="checkbox" class="cbx-usb" checked>USB's</li>
                    </ul>
                </div>
                <div class="container col-xs-12 col-sx-12 col-10  d-inline">
                    <div class="selectContainer">
                        <select name="houses" id="houses" class="custom-select">
                            <option value="0">All Houses</option>
                            <option value="1">Variable Vikings</option>
                            <option value="2">Database Dragons</option>
                            <option value="3">Recursive Ravens</option>
                            <option value="4">Script Serpents</option>
                        </select>
                    </div>
                    <div class="row">
                        @foreach($products as $product)
                            <div class="house{{$product->house->id}} category{{$product->category->id}} display-block">
                            <div class="block span3">
                                <div class="product">
                                        <img src="{{$product->img}}" alt="{{$product->house->name}} {{$product->category->name}}">
                                    <div class="buttons">
                                        <a class="preview btn btn-large btn-info" href="{{action('WarehouseController@show',$product->id)}}"><i class="glyphicon glyphicon-eye-open"></i> View item</a>
                                    </div>
                                </div>
                                <div class="info">
                                    <h4>{{$product->house->name}}<br> {{$product->category->name}}</h4>
                                    @foreach($product->warehouse as $price)
                                        @if($loop->first)
                                            <span class="price">€{{$price->price}}</span>
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
    <script src="{{asset('js/jQuery-3.2.1.js')}}"></script>
    <script src="{{asset('js/filterShop.js')}}"></script>

@endsection