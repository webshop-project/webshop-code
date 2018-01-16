@extends('layouts.adminMaster')
@section('title')
    Home
@endsection


@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="container indexTitle col-12">
                <h2>USERS</h2>
            </div>
            <div class="row row-sizer-userinfo">
                @foreach($users as $user)

                    <div class="col-4 product-info">
                        <div class="item-info">
                            <div class="form-inline">
                                <div class="img-preview col-7">
                                    <img style="width: 100%" src="/img/userImage.png" alt="">
                                </div>
                                <div class="col-5">
                                    <p><b>Name:</b></p>
                                    <span>{{$user->name}}</span>
                                </div>
                                <div class="desc">
                                </div>
                            </div>
                            <div class="row text-center" style="margin-top: 10px">
                                <div class="col-3"></div>
                                <a href="{{action('UserController@show', $user->id)}}">
                                    <button class="btn btn-info" style="margin-right: 5px">Show Detail</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if (session('succes'))
                <div class="alert alert-success">
                    <h3>{{ session('succes') }}</h3>
                </div>>
            @endif
            {{$users->links()}}
        </div>
    </div>
@endsection