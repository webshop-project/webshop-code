@extends('layouts/adminMaster')
@section('title')
    Add voucher
@endsection

@section('content')
<div class="center" style="text-align: center">

    <img src="{{ $message->embed($topImage)}}" alt="Voucher top image">
    <div class="head">
        <h2 class="">Geachte {{$firstName}}</h2>
        <p class="">Hierbij ontvangt u uw voucher code.</p>
    </div>
    <div class="content">
        <p><strong>{{$code}}</strong></p>
        <small class="form-text text-muted ">Bovenstaande code is {{$value}} euro waard.</small>
        <p class="text-muted">Deze code kun u gebruiken vanaf: <strong>{{$startDate}}</strong> tot <strong>{{$endDate}}</strong></p>
    </div>
        <div class="foot">
            <p>Maak gelijk gebruik van deze code op: <a href="{{$siteLink}}">FourHouses-shop</a></p>
            <p>Met vriendelijke groet, FourHouses-shop</p>
        </div>
    <img src="{{ $message->embed($bottomImage) }}" alt="Voucher bottom image">

</div>
@endsection
