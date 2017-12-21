@extends('layouts/adminMaster')
@section('title')
    LowStockList
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="list-group">
                @foreach($lowOnStock as $lowStock)
                    <div class="list-item">
                        Name: {{$lowStock->house->name}}
                              {{$lowStock->category->name}}
                        Supply: {{$lowStock->supply}}
                        <a class="btn btn-warning" href="{{action('WarehouseController@show',$lowStock->id)}}">Show</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection