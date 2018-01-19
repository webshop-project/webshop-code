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

                    <form action="{{action('UserController@update', $user->id)}}" method="POST" >
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group form-padding">
                            <p>id 1 = Viking, id 2 = Dragon, id 3 = Raven, id 4 = Serpent.</p>
                        </div>
                        <div class="form-group form-padding">
                            <label for="house_id">House :</label>
                            <input class="form-control col" type="number" name="house_id" value="{{$user->house_id}}">
                        </div>
                        <div class="form-group form-padding">
                                <label for="streetName">Streetname :</label>
                                <input class="form-control col" type="text" name="streetName" value="{{$user->streetName}}">
                        </div>
                        <div class="form-group form-padding">
                                <label for="houseNumber">Housenumber :</label>
                                <input class="form-control col" type="number" name="houseNumber" value="{{$user->houseNumber}}">
                        </div>
                        <div class="form-group form-padding">
                                <label for="houseNumberAdd">Housenumber Addon :</label>
                                <input class="form-control col" type="text" name="houseNumberAdd" value="{{$user->houseNumberAdd}}">
                        </div>
                        <div class="form-group form-padding">
                            <label for="zipcode">Zipcode :</label>
                            <input class="form-control col" type="text" name="zipcode" value="{{$user->zipcode}}">
                        </div>
                        <div class="form-group form-padding">
                            <input type="submit" class="btn btn-success" value="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection