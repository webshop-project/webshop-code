@extends('layouts/adminMaster') @section('title') Add Products @endsection @section('content')
    <div class="container addSizer">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        <div class="page-header">
            <h2>Add products</h2>
        </div>
        <div class="container d-inline">
            <div class="row">
                <div class="col">

                    <div class="form">
                        <form class="form-inline" action="{{action('WarehouseController@store')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col">
                                <div class="form-group form-padding">
                                    <label for="category" class="col-2">Categorie</label>
                                    <select class="form-control col" name="category" id="category">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group form-padding">
                                    <label for="house" class="col-2">House</label>
                                    <select class="form-control col" name="house" id="house">
                                        @foreach($houses as $house)
                                            <option value="{{$house->id}}">{{$house->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="groupStandard">
                                    <div class="form-group form-padding">
                                        <label for="price" class="col-2">Prijs</label>
                                        <input class="form-control col" type="number" step="any" name="priceSt">
                                    </div>
                                    <div class="form-group form-padding">
                                        <label for="stock" class="col-2">Voorraad</label>
                                        <input class="form-control col" type="number" name="stockSt">
                                    </div>
                                </div>
                                <div class="col sizes d-none" id="shirtSizes">
                                    <h5>Maten</h5>
                                    <div class="form-group small-group flex flex-between">
                                        <label for="sizeS">S</label>
                                        <input class="form-control" type="checkbox" id="sizeS" name="sizeS">
                                    </div>
                                    <div id="groupS" class="d-none">
                                        <div class="form-group form-padding">
                                            <label for="price" class="col-2">Prijs</label>
                                            <input class="form-control col" type="number" step="any" name="priceS">
                                        </div>
                                        <div class="form-group form-padding">
                                            <label for="stock" class="col-2">Voorraad</label>
                                            <input class="form-control col" type="number" name="stockS">
                                        </div>
                                    </div>
                                    <div class="form-group small-group flex flex-between">
                                        <label for="sizeM">M</label>
                                        <input class="form-control" type="checkbox" id="sizeM" name="sizeM">
                                    </div>
                                    <div id="groupM" class="d-none">
                                        <div class="form-group form-padding">
                                            <label for="price" class="col-2">Prijs</label>
                                            <input class="form-control col" type="number" step="any" name="priceM">
                                        </div>
                                        <div class="form-group form-padding">
                                            <label for="stock" class="col-2">Voorraad</label>
                                            <input class="form-control col" type="number" name="stockM" id="stockM">
                                        </div>
                                    </div>
                                    <div class="form-group small-group flex flex-between">
                                        <label for="sizeL">L</label>
                                        <input class="form-control" type="checkbox" id="sizeL" name="sizeL">
                                    </div>
                                    <div id="groupL" class="d-none">
                                        <div class="form-group form-padding">
                                            <label for="price" class="col-2">Prijs</label>
                                            <input class="form-control col" type="number" step="any" name="priceL">
                                        </div>
                                        <div class="form-group form-padding">
                                            <label for="stock" class="col-2">Voorraad</label>
                                            <input class="form-control col" type="number" name="stockL" id="stockL">
                                        </div>
                                    </div>
                                    <div class="form-group small-group flex flex-between">
                                        <label for="sizeXL">XL</label>
                                        <input class="form-control" type="checkbox" id="sizeXL" name="sizeXL">
                                    </div>
                                    <div id="groupXL" class="d-none">
                                        <div class="form-group form-padding">
                                            <label for="price" class="col-2">Prijs</label>
                                            <input class="form-control col" type="number" step="any" name="priceXL">
                                        </div>
                                        <div class="form-group form-padding">
                                            <label for="stock" class="col-2">Voorraad</label>
                                            <input class="form-control col" type="number" name="stockXL" id="stockXL">
                                        </div>
                                    </div>
                                </div>
                                <div class="col sizes d-none" id="usbSizes">
                                    <h5>USB groote</h5>
                                    <div class="form-group small-group flex flex-between">
                                        <label for="size8">8GB</label>
                                        <input class="form-control" type="checkbox" id="size8" name="size8">
                                    </div>
                                    <div id="group8" class="d-none">
                                        <div class="form-group form-padding">
                                            <label for="price" class="col-2">Prijs</label>
                                            <input class="form-control col" type="number" step="any" name="price8">
                                        </div>
                                        <div class="form-group form-padding">
                                            <label for="stock" class="col-2">Voorraad</label>
                                            <input class="form-control col" type="number" name="stock8">
                                        </div>
                                    </div>
                                    <div class="form-group small-group flex flex-between">
                                        <label for="size16">16GB</label>
                                        <input class="form-control" type="checkbox" id="size16" name="size16">
                                    </div>
                                    <div id="group16" class="d-none">
                                        <div class="form-group form-padding">
                                            <label for="price" class="col-2">Prijs</label>
                                            <input class="form-control col" type="number" step="any" name="price16">
                                        </div>
                                        <div class="form-group form-padding">
                                            <label for="stock" class="col-2">Voorraad</label>
                                            <input class="form-control col" type="number" name="stock16" id="stock16">
                                        </div>
                                    </div>
                                    <div class="form-group small-group flex flex-between">
                                        <label for="size32">32GB</label>
                                        <input class="form-control" type="checkbox" id="size32" name="size32">
                                    </div>
                                    <div id="group32" class="d-none">
                                        <div class="form-group form-padding">
                                            <label for="price" class="col-2">Prijs</label>
                                            <input class="form-control col" type="number" step="any" name="price32">
                                        </div>
                                        <div class="form-group form-padding">
                                            <label for="stock" class="col-2">Voorraad</label>
                                            <input class="form-control col" type="number" name="stock32" id="stock32">
                                        </div>
                                    </div>
                                    <div class="form-group small-group flex flex-between">
                                        <label for="size64">64GB</label>
                                        <input class="form-control" type="checkbox" id="size64" name="size64">
                                    </div>
                                    <div id="group64" class="d-none">
                                        <div class="form-group form-padding">
                                            <label for="price" class="col-2">Prijs</label>
                                            <input class="form-control col" type="number" step="any" name="price64">
                                        </div>
                                        <div class="form-group form-padding">
                                            <label for="stock" class="col-2">Voorraad</label>
                                            <input class="form-control col" type="number" name="stock64" id="stock64">
                                        </div>
                                    </div>
                                </div>

                            </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="form-group textSizerForm">
                        <label for="description">Beschrijving</label>
                        <textarea class="form-control" name="description" id="description" cols="45" rows="5"
                                  required></textarea>
                    </div>
                    <div class="w-100"></div>
                    <div class="form-group  -between upload">
                        <label for="image">Upload Foto</label>
                        <input class="form-control" type="file" name="image[]" id="image" multiple required>
                    </div>
                    <input class="btn btn-default" type="submit" value="Save" class="save">
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection