<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://use.fontawesome.com/3571e1e4e4.js"></script>
    <script src="jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
            integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/serpent.css')}}">
    <title>AMO Webshop | @yield('title')</title>
</head>

<body>
<header>
    <div class="bg-header-top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-inline-flex align-self-center">
                        <i class="fa fa-search fa-2x grayIcons" aria-hidden="true"></i>
                        <a class="login" href="#"><span>Login</span></a>
                        <a class="register" href="#"><span>Register</span></a>
                    </div>
                </div>

                <div class="align-items-center d-flex">
                    <span><i class="fa fa-star fa-2x grayIcons blr" aria-hidden="true"></i></span>
                    <span style="cursor:pointer" onclick="openNav()"><i class="fa fa-shopping-cart fa-2x grayIcons br" aria-hidden="true"></i></span>
                    <div id="myShoppingCart" class="cart">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <div class="cart-title">
                            <h2>Your Cart</h2>
                        </div>
                        <div class="cart-items">
                            @if (sizeof(Cart::content()) > 0)

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Size</th>
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
                                                    <input type="submit" class="btn btn-danger btn-sm" value="Remove">
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
                                    <td></td>
                                    <td></td>
                                    <td class="small-caps table-bg" style="text-align: right">Your Total</td>
                                    <td class="table-bg">€{{ Cart::total() }}</td>
                                    <td class="column-spacer"></td>
                                    <td></td>
                                    </tr>

                                    </tbody>
                                </table>&nbsp;

                                <a href="{{url('/shop/cart')}}" class="btn btn-success btn-lg">Proceed to Checkout</a>

                                <div style="float:right">
                                    <form action="{{ url('/emptyCart') }}" method="POST">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" class="btn btn-danger btn-lg" value="Empty Cart">
                                    </form>
                                </div>

                            @else
                                <h3>You have no items in your shopping cart</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-header-bottom">
        <div class="container-fluid bg-secondary">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light row justify-content-between">
                    <a class="col-sm-12 col-xs-12 col-md-4 row justify-content-center" href="/">
                        {{--<img class="img-fluid img-sizer-front col-8" src="{{asset('img/amologin2.png')}}" alt="">--}}
                        <img class="img-fluid img-sizer-front" src="{{asset('img/script_serpents_xs.png')}}" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse navbar-right" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto col-12 row justify-content-around">
                            <li class="nav-item">
                                <a class="nav-link navLinkPadding" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navLinkPadding" href="/shop">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navLinkPadding" href="/about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navLinkPadding" href="/contact">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<div class="container-fluid">

    @yield('content')

    <img class="page-under" src="../img/script_serpents_under_small_crop.png" alt="">
</div>
<footer>
    <div class="container-fluid bg-secondary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="p-4">
                    <a href="#">
                        <i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="p-4">
                    <a href="#">
                        <i class="fa fa-twitter fa-3x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="p-4">
                    <a href="#">
                        <i class="fa fa-linkedin fa-3x" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="row justify-content-center">
                <p>Copyright</p>
            </div>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
<script>
    function openNav() {
        document.getElementById("myShoppingCart").style.width = "550px";
    }
    function closeNav() {
        document.getElementById("myShoppingCart").style.width = "0";
    }
</script>
<script src="{{asset('js/showImage.js')}}"></script>
</body>
</html>

