@extends('layouts.adminMaster')
@section('title')
    Home
@endsection


@section('content')
    <div class="container-fluid">
        <div class="container">
            <h2>Editing => {{$products->name}}</h2>
            <form action="{{action('ProductController@update', $products->id)}}" method="POST">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="name"><b>Name</b></label>
                    <input class="form-control" type="text" name="first" value="{{$products->name}}">
                </div>
                <div class="form-group">
                    <label for="category"><b>Category</b></label>
                    <select class="form-control" name="category">
                        @foreach($categories as $category)
                            <option class="form-control" value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="category"><b>House</b></label>
                    <select class="form-control" name="house">
                        @foreach($houses as $house)
                            <option class="form-control" value="{{$house->id}}">{{$house->name}}</option>
                        @endforeach
                    </select>
                </div>

                @if($products->brand_id > 0)
                    <div class="form-group">
                        <label for="brand_id"><b>Brand</b></label>
                        <select class="form-control" name="brand">
                            @foreach($brands as $brand)
                                <option class="form-control" value="{{$brand->id}}">{{$brand->brandName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="model"><b>Brand Model</b></label>
                        <select class="form-control" name="model">
                            @foreach($models as $model)
                                <option class="form-control" value="{{$model->id}}">{{$model->modelName}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                @if($products->storage_id > 0)
                    <div class="form-group">
                        <label for="storage"><b>Storage (in GigaBytes)</b></label>
                        <select class="form-control" name="storage">
                            @foreach($storages as $storage)
                                <option class="form-control" value="{{$storage->id}}">{{$storage->gb}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
            </form>

            <div class="form-group">
                <h2>Current Images</h2>
                <div class="row">
                    @foreach($images as $image)
                        <div class="col-4 product-info">
                            <div class="item-info">
                                <div class="form-inline">
                                    <div class="img-preview col-6">
                                        <img width="100%" src="{{$image->img}}" alt="">
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
            </form>
        </div>
    </div>
@endsection