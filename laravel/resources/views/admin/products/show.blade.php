@extends('layouts/adminMaster')
@section('title')
    Home
@endsection


@section('content')
    <div class="container">
        <h2>Sales Info</h2>
        @foreach($showProduct as $productDetail)
            <h3>Total Sold</h3>
            <p>{{\App\order::where('warehouse_id','=',$productDetail->product_id)->sum('amount')}}</p>
            <h3>last month days Sold</h3>
            <p>{{$lastMonth}}</p>
        @endforeach
    </div>

@endsection