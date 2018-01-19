@extends('layouts/pagesMaster')

@section('content')
    @php
        $total = Cart::total();

        if(!empty(Session::get('message')))
        {
        $message = Session::pull('message');
        $discount = Session::pull('discount');
        $newPrice = Session::pull('value');
        $positive = Session::pull('positive');
        }

    @endphp
    <div class="container">
        <p><a href="{{ url('shop') }}">Home</a> / Cart</p>
        <h1>Your Cart</h1>

        <hr>

        @if (sizeof(Cart::content()) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Price Per Item</th>
                    <th>Price</th>
                    <th class="column-spacer"></th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <tr class="border-bottom">

                @foreach (Cart::content() as $item)
                    <tr>
                        <td class="item-name"><a href="{{ url('shop', [$item->name]) }}">{{ $item->name }}</a></td>
                        <td>
                            {{$item->qty}}
                            {{--<select class="quantity" data-id="{{ $item->rowId }}">--}}
                            {{--<option value="{{ $item->qty == 1 ? 'selected' : '' }}">1</option>--}}
                            {{--<option value="{{ $item->qty == 2 ? 'selected' : '' }}">2</option>--}}
                            {{--<option value="{{ $item->qty == 3 ? 'selected' : '' }}">3</option>--}}
                            {{--<option value="{{ $item->qty == 4 ? 'selected' : '' }}">4</option>--}}
                            {{--<option value="{{ $item->qty == 5 ? 'selected' : '' }}">5</option>--}}
                            {{--</select>--}}
                        </td>
                        <td>{{$item->size}}</td>
                        <td>€{{ $item->subtotal }}</td>
                        <td class=""></td>
                        <td>
                            <form action="{{ action('CartController@destroy', $item->rowId) }}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                {{method_field('DELETE')}}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn btn-danger btn-sm btn-checkout" value="Remove">
                            </form>
                        </td>
                    </tr>

                @endforeach
                <tr>
                    <td class="table-image"></td>
                    <td></td>
                    <td></td>
                    <td class="small-caps table-bg" style="text-align: right">Subtotal</td>
                    <td>€{{ Cart::instance('default')->subtotal() }}</td>
                    <td></td>
                    <td></td>
                </tr>
                @if(isset($discount))

                <tr>
                    <td class="table-image"></td>
                    <td></td>
                    <td></td>
                    <td class="small-caps table-bg" style="text-align: right">Discount:</td>
                    <td>{{$discount}} Euro</td>
                    <td></td>
                    <td></td>
                </tr>
                @endif
                <td></td>
                <td></td>
                <td></td>

                @if(isset($discount))
                    {{$discountValue = str_replace(",", ".", $discount)}}
                    {{$totalValue = str_replace(",", ".", Cart::instance('default')->subtotal())}}
                    <td class="small-caps table-bg" style="text-align: right">Subtotal with discount:</td>
                    <td class="table-bg">€{{$newprice = number_format($totalValue - $discountValue,2)}}</td>
                    @else
                @endif
                <td class="column-spacer"></td>
                <td></td>
                </tr>

                </tbody>
            </table>


            <div class="col-md-12 form-inline">
                <form action="{{action('VoucherController@check')}}" method="post" class="form-inline">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <div class="input-group-prepend">
                            @if(isset($message))
                                @if($positive == 1)
                                    <div class="alert alert-success" role="alert">
                                        <span>{{$message}}</span>
                                    </div>
                                @else
                                    <div class="alert alert-danger" role="alert">
                                        <span>{{$message}}</span>
                                    </div>
                                @endif
                            @endif

                            <label class="mb-3">Add your voucher code below</label>
                            <input type="text" class="form-control" name="voucherCode">
                            <input type="hidden" name="total" value="{{$total}}">
                        </div>
                        <input type="submit" value="Check Code" class="btn btn-success mb-5 mt-3">

                    </div>

                </form>
                <form action="{{ url('/emptyCart') }}" method="POST" class="col-md-2 col-md-offset-4">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger btn-lg" value="Empty Cart">
                </form>
            </div>
            <div class="checkout" style="margin-top: 100px; margin-bottom: 50px;">
                <a href="{{ url('/shop') }}" class="btn btn-primary btn-lg col-md-2">Continue Shopping</a> &nbsp;
                <form action="{{action('PayPalController@getExpressCheckout')}}" method="post" class="col-md-2">
                    {{csrf_field()}}
                    @foreach(Cart::content() as $item)
                        <input type="hidden" name="item[{{$item->id}}][name]" value="{{$item->name}}">
                        <input type="hidden" name="item[{{$item->id}}][price]" value="{{$item->price}}">
                        <input type="hidden" name="item[{{$item->id}}][qty]" value="{{$item->qty}}">
                    @endforeach
                    <input type="submit" value="Proceed to Checkout" class="btn btn-success btn-lg">
                </form>
            </div>
        @else

            <h3>You have no items in your shopping cart</h3>
            <a href="{{ url('/shop') }}" class="btn btn-primary btn-lg">Continue Shopping</a>

        @endif

        <div class="spacer"></div>

    </div> <!-- end container -->

@endsection

@section('cartupdate')
    <script>
        (function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.quantity').on('change', function() {
                var id = $(this).attr('data-id')
                $.ajax({
                    type: "PATCH",
                    url: '{{ url("/cart") }}' + '/' + id,
                    data: {
                        'quantity': this.value,
                    },
                    success: function(data) {
                        window.location.href = '{{ url('/cart') }}';
                    }
                });

            });

        })();

    </script>
@endsection
