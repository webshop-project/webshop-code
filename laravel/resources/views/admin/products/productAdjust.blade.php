@extends('layouts.adminMaster')
@section('title')
    Home
@endsection
@section('content')
    <div class="container-fluid">
        <div class="container">
            @foreach($products as $product)
            <h2>Editing
                @if(!empty($product->product->category_id) && $product->product->category_id == 5) Shirt size {{$product->size->size}}
                @elseif(!empty($product->product->category_id) && $product->product->category_id == 6) usb size {{$product->size->size}}GB
                @endif
            </h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{action('WarehouseController@update', $product->id)}}" method="POST" >
                {{csrf_field()}}
                {{method_field('PUT')}}
                <h4>De prijs is in Euro's</h4>
                <div class="form-group form-padding">
                    <label for="price">Prijs</label>
                    <input class="form-control col" type="number" step="any" name="price" value="{{$product->price}}">
                </div>
                <div class="form-group form-padding">
                    <label for="stock">Voorraad</label>
                    <input class="form-control col" type="number" name="stock" value="{{$product->supply}}">
                </div>
                <h4>De korting is een percentage</h4>
                <div class="form-group form-padding">
                    <label for="stock">Discount</label>
                    <input class="form-control col" value="@if(!empty($product->discount->discount)){{$product->discount->discount}}@endif" type="number" name="discount">
                </div>
                <div class="form-group form-padding">
                    <label for="startDate" class="col-form-label col-form-label-lg">Start date:</label>
                    <input type="date" @if(!empty($product->discount->start_date)) value="{{$product->discount->start_date->format('Y-m-d')}}" placeholder="{{$product->discount->start_date->format('Y-m-d')}}" @endif name="startDate" class="form-control-lg form-control">
                </div>
                <div class="form-group form-padding">
                    <label for="endDate" class="col-form-label col-form-label-lg">End date:</label>
                    <input type="date" @if(!empty($product->discount->end_date)) value="{{$product->discount->end_date->format('Y-m-d')}}" placeholder="{{$product->discount->end_date->format('Y-m-d')}}" @endif name="endDate" class="form-control-lg form-control">
                </div>
                <div class="form-group form-padding">
                    <input type="submit" class="btn btn-success" value="submit" />
                </div>
            </form>
            <div class="form-group">
                <h2>Current Images</h2>
                <div class="row">
                    @if(!empty($product->product->img))
                    <div class="col-4 product-info">
                        <div class="item-info">
                            <div class="form-inline">
                                <div class="img-preview col-6">
                                    <img width="100%" src="{{$product->product->img}}" alt="product_img">
                                </div>
                                <div class="delete col-1">
                                    <form action="{{action('ImageController@destroyMainPic', $product->product->id)}}"
                                          method="post">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                        <input type="hidden" name="test" value="{{$product->product->id}}">
                                        <input class="btn btn-danger" type="submit" value="Delete Image">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @foreach($product->product->image as $image)
                        <div class="col-4 product-info">
                            <div class="item-info">
                                <div class="form-inline">
                                    <div class="img-preview col-6">
                                        <img width="100%" src="{{$image->img}}" alt="product_img">
                                    </div>
                                    <div class="delete col-1">
                                        <form action="{{action('ImageController@destroy', $image->id)}}"
                                              method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <input type="hidden" name="test" value="{{$image->id}}">
                                            <input class="btn btn-danger" type="submit" value="Delete Image">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection