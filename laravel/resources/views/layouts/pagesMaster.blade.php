<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <title>AMO Webshop | @yield('title')</title>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-xs-11 d-flex align-self-center">
            <i class="fa fa-search fa-2x grayIcons" aria-hidden="true"></i>
            <a class="login" href="#"><span>Login</span></a>
            <a class="register" href="#"><span>Register</span></a>
        </div>
    </div>
</div>
<div class="container-fluid bg-secondary">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand row col" href="#"><img class="img-responsive col-10" src="img/amologin2.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item">
                        <a class="nav-link navLinkPadding" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navLinkPadding" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navLinkPadding" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navLinkPadding" href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <span style="cursor:pointer" onclick="openNav()"><i class="fa fa-shopping-cart fa-2x grayIcons br" aria-hidden="true"></i></span>
        </nav>
        <div class="shoppingcart">
            <div id="myShoppingCart" class="cart">
                <div class="cart-top">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <h2>Your Cart</h2>
                </div>
                <div class="cart-items">
                    @if(Session::has('cart'))
                        @foreach(Session::get('cart') as $item)
                            <a href="/shop/{{$product->name}}">
                                <img src="{{$product->img}}" class="img-fluid img-responsive"
                                     alt="{{$product->name}}">
                                <h6>{{$product->name}}</h6>
                            </a>
                            <span>€{{$product->price}}</span>
                            <span>{{$product->size}}</span>
                            <a href="" class="closebtn">&times;</a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">

    @yield('content')

</div>

<footer>
    <div class="container-fluid bg-secondary p-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="p-5">
                    <a href="#">
                        <i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="p-5">
                    <a href="#">
                        <i class="fa fa-twitter fa-3x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="p-5">
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
</div>
<script>
    function openNav() {
        document.getElementById("myShoppingCart").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("myShoppingCart").style.width = "0";
    }
</script>
</body>
</html>

