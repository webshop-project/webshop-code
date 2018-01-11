@extends('layouts.adminMaster')
@section('title')
    Home
@endsection
@section('content')
    <div class="container-fluid">
        <div class="container">
            @foreach($products as $key => $product)
            <h2>Editing   @if($product->product->category_id == 5) Shirt size{{$product->size->size}}
                @elseif($product->product->category_id == 6) usb size {{$product->size->size}}GB @endif</h2>
            <form action="{{action('WarehouseController@update', $product->product_id)}}" method="POST" name="form{{$key}}">
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
                    <input class="form-control col" type="number" name="discount">
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

                @if(!empty($products->brand_id))
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

                @if(!empty($products->storage_id))
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
            @endforeach
                <input type="button"  class="btn btn-success" value="Submit" onclick="submitForms()"/>
        </div>
    </div>
    <script>
        submitForms = function() {
            document.forms["form0"].submit();
            document.forms["form1"].submit();
            document.forms["form2"].submit();
            document.forms["form3"].submit();
        }
    </script>
@endsection