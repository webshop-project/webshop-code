@extends('layouts/adminMaster')
@section('title')
    Category
@endsection
@section('content')
<div class="container">
    <div class="row row-sizer-userinfo">

            @foreach($categories as $categorie )
                <div class="col-4 product-info">
                    <div class="item-info">
                        <div class="form-inline">
                            <div class="col-1">
                                <p><b>Title:</b></p>
                                <p>{{$categorie->name}}</p>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="/categorie/{{$categorie->id}}/edit"><button class="btn btn-succes">Edit categorie</button></a>
                            <button class="btn btn-danger">Delete categorie</button>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
    <a class="btn btn-success" href="categorie/create"><b>Voeg categorie toe</b></a>

    <ul class="pagination ">
        {{$categories->links()}}
    </ul>
</div>


@endsection