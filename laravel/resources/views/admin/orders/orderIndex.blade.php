@extends('admin/index')

@section('content')
<div class="constainer-fluid userinfo">
    <div class="container">
        <div class="container indexTitle col-12">
            <h2>ORDERS</h2>
        </div>
        <div class="row row-sizer-userinfo">
        @foreach($orders as $order)

                <div class="col-4 product-info">
                    <div class="item-info">
                        <div class="form-inline">
                            <div class="h5" href="#">
                                <p> Name: </p>{{$order->user_id}}
                                <p> Product: </p>{{$order->product_id}}
                                <p> amount: </p>{{$order->amount}}
                                <p> Purchased at: </p>{{$order->bought_at}}
                                <p> total price: </p>{{$order->price}}
                                <div class="">
                                    <button type="button" class="btn btn-success" href="#">View</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
        </div>

        {{$orders->links()}}



        {{--<table class="table table-striped">--}}
            {{--<thead>--}}
            {{--<tr>--}}
                {{--<th class="h3" scope="col">Order number:</th>--}}
                {{--<th class="h3" scope="col">Name customer:</th>--}}
                {{--<th class="h3" scope="col">Amount of products:</th>--}}
                {{--<th class="h3" scope="col">Date:</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
            {{--<tr data-href="{{action('PagesController@productAdd')}}" class="active-tr">--}}
                {{--<td class="h5"><a href="">1</a></td>--}}
                {{--<td class="h5">Jacob</td>--}}
                {{--<td class="h5">1</td>--}}
                {{--<td class="h5">24-09-2017</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td class="h5"><a href="">2</a></td>--}}
                {{--<td class="h5">Mark van Duinen</td>--}}
                {{--<td class="h5">2</td>--}}
                {{--<td class="h5">24-09-2017</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td class="h5"><a href="">3</a></td>--}}
                {{--<td class="h5">Gerrit Gerritsen</td>--}}
                {{--<td class="h5">4</td>--}}
                {{--<td class="h5">24-09-2017</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td class="h5"><a href="">4</a></td>--}}
                {{--<td class="h5">Santi Dudok</td>--}}
                {{--<td class="h5">1</td>--}}
                {{--<td class="h5">24-09-2017</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td class="h5"><a href="">5</a></td>--}}
                {{--<td class="h5">piet paulussen</td>--}}
                {{--<td class="h5">5</td>--}}
                {{--<td class="h5">24-09-2017</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td class="h5"><a href="">6</a></td>--}}
                {{--<td class="h5">piet paulussen</td>--}}
                {{--<td class="h5">5</td>--}}
                {{--<td class="h5">24-09-2017</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td class="h5"><a href="">7</a></td>--}}
                {{--<td class="h5">piet paulussen</td>--}}
                {{--<td class="h5">5</td>--}}
                {{--<td class="h5">24-09-2017</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td class="h5"><a href="">8</a></td>--}}
                {{--<td class="h5">piet paulussen</td>--}}
                {{--<td class="h5">5</td>--}}
                {{--<td class="h5">24-09-2017</td>--}}
            {{--</tr>--}}
            {{--</tbody>--}}
        {{--</table>--}}
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    </div>
</div>
@endsection