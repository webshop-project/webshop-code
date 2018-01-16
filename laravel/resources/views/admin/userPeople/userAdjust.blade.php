@extends('layouts.adminMaster')
@section('title')
    Users
@endsection


@section('content')

    <div class="">
        <div class="user-info">
            <div class="form-inline">
                <div class="col-3">
                    <img style="max-width: 300px" src="/img/userImage.png" alt="">
                </div>
                <div class="col-5 img-preview-left">
                    <p><b>Name:</b></p>
                    <span>{{$user->name}}</span>
                    <p><b>Address:</b></p>
                    <span>{{$user->streetName}} {{$user->houseNumber}}</span>
                    <p><b>Zipcode:</b></p>
                    <span>{{$user->zipcode}}</span>
                    <p><b>Created at:</b></p>
                    <span>{{$user->created_at}}</span>
                </div>
            </div>
        </div>
    </div>

@endsection