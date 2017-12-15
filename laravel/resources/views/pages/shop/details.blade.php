@extends('layouts/pagesMaster')

@section('title')
    Detail
@endsection

@section('content')

<div class="jumbotron bg-danger">
        <div class="container">
            <h1 class="text-white">
                Banner
            </h1>
        </div>
    </div>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../website_youri/home.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">House Dragon</a></li>
            <li class="breadcrumb-item"><a href="#">Show</a></li>
            <li class="breadcrumb-item active">Shop</li>
        </ol>
        <div class="row">
            <div class="col-5">
                <img class="img-responsive" src="cap__dragon_front.png" alt="Product image">
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 ">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>House:</td>
                        <td>Dragon</td>
                    </tr>
                    <tr>
                        <td>Size:</td>
                        <td>M</td>
                    </tr>
                    <tr>
                        <td>Color:</td>
                        <td>White</td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td>€24,99</td>
                    </tr>
                    </tbody>
                </table>
                <div class="btn-group" role="group">
                    <button type="button" class="btn bg-danger btn-danger">
                        Add2Cart
                        <i class="fa fa-cart-plus fa-2x" aria-hidden="true"></i>
                        </button>
                    <a class="btn bg-danger btn-danger" href="http://hrefshare.com/64c3e">
                        Share
                        <i class="fa fa-share-alt fa-2x" aria-hidden="true"></i>
                    </a>
                    <button type="button" class="btn bg-danger btn-danger">
                        Favorite
                        <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                    </button>

                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <h2>Lorem Ipsum</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam, blanditiis cum dignissimos doloremque dolorum, earum eius ex excepturi facere mollitia porro possimus quis ratione reprehenderit sed voluptas! Autem, dolorum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, distinctio eligendi id iste odio quibusdam sit. Beatae doloribus ea labore laboriosam laborum laudantium libero optio saepe, ut veniam. Recusandae, saepe.
            </p>
        </div>
        <hr>
        <div id="myCarousel" class="carousel slide ">
            <div class="carousel-inner">
                <div class="item active col">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <a href="#">
                                        <img src="back_dragon.png" class="img-responsive thumbnail" alt="dragon t-shirt">
                                        <h4>Dragon Shirt</h4>
                                        <span>€24,99</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <a href="#">
                                        <img src="back_dragon.png" class="img-responsive thumbnail" alt="dragon t-shirt">
                                        <h4>Dragon Shirt</h4>
                                        <span>€24,99</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <a href="#">
                                        <img src="back_dragon.png" class="img-responsive thumbnail" alt="dragon t-shirt">
                                        <h4>Dragon Shirt</h4>
                                        <span>€24,99</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <a href="#">
                                        <img src="back_dragon.png" class="img-responsive thumbnail" alt="dragon t-shirt">
                                        <h4>Dragon Shirt</h4>
                                        <span>€24,99</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <a href="<span id=""></span>">
                                        <img src="back_dragon.png" class="img-responsive thumbnail" alt="dragon t-shirt">
                                        <h4>Dragon Shirt</h4>
                                        <span>€24,99</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <a href="#">
                                        <img src="back_dragon.png" class="img-responsive thumbnail" alt="dragon t-shirt">
                                        <h4>Dragon Shirt</h4>
                                        <span>€24,99</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <a href="#">
                                        <img src="back_dragon.png" class="img-responsive thumbnail" alt="dragon t-shirt">
                                        <h4>Dragon Shirt</h4>
                                        <span>€24,99</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <a href="#">
                                        <img src="back_dragon.png" class="img-responsive thumbnail" alt="dragon t-shirt">
                                        <h4>Dragon Shirt</h4>
                                        <span>€24,99</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <a href="#">
                                        <img src="back_dragon.png" class="img-responsive thumbnail" alt="dragon t-shirt">
                                        <h4>Dragon Shirt</h4>
                                        <span>€24,99</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <a href="#">
                                        <img src="back_dragon.png" class="img-responsive thumbnail" alt="dragon t-shirt">
                                        <h4>Dragon Shirt</h4>
                                        <span>€24,99</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <a href="#">
                                        <img src="back_dragon.png" class="img-responsive thumbnail" alt="dragon t-shirt">
                                        <h4>Dragon Shirt</h4>
                                        <span>€24,99</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <a href="#">
                                        <img src="back_dragon.png" class="img-responsive thumbnail" alt="dragon t-shirt">
                                        <h4>Dragon Shirt</h4>
                                        <span>€24,99</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <i class="fa fa-arrow-left fa-3x align-self-center" aria-hidden="true"></i>
            </a>

            <a class="right carousel-control " href="#myCarousel" data-slide="next">
                <i class="fa fa-arrow-right fa-3x align-self-center" aria-hidden="true"></i>
            </a>
        </div>
    </div>

@endsection