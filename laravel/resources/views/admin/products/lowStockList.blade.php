@extends('layouts/adminMaster')
@section('title')
    LowStockList
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="list-group">
                @foreach($lowOnStock as $lowStock)
                    <div class="list-item">{{$lowStock->product_id}}</div>
                @endforeach
            </div>
        </div>
    </div>
@endsection