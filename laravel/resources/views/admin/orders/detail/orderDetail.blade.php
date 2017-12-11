@extends('layouts/adminMaster')
@section('title')
    orders detail
@endsection


@section('content')
    <div class="container">
        <form action="{{action('OrderController@finish', $order->id)}}">
            {{csrf_field()}}
            <input type="submit" value="Finish Order" id="finishButton">
        </form>
    </div>
@endsection









@if ( $errors->any() )
    @foreach($errors->all() as $error)
        <li> {{ $error }} </li>
    @endforeach
@endif
