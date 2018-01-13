@extends('layouts/adminMaster')
@section('title')
    Home
@endsection

@section('content')
    <div class="container-fluid userinfo">
        <div class="container">
            <div class="container indexTitle col-12">
                <h2>GLOBAL INFORMATION</h2>
            </div>
            <div class="row row-sizer-userinfo">
                <div class="col-lg-2"></div>
                <div class="item col-lg-2 col-md-3">
                    <div class="item-info text-center">
                        <span>Amount Of Products</span>
                        <div class="mw-100"></div>
                        <i class="fa fa-shopping-bag justified-content-center" aria-hidden="true"></i>
                        <div class="mw-100"></div>
                        <span>{{\App\Warehouse::all()->count()}}</span>
                    </div>
                </div>
                <div class="item col-lg-2 col-md-3">
                    <div class="item-info text-center">
                        <span>Amount Of Users</span>
                        <div class="mw-100"></div>
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <div class="mw-100"></div>
                        <span>{{\App\User::all()->count()}}</span>
                    </div>
                </div>
                <div class="item col-lg-2 col-md-3">
                    <div class="item-info text-center">
                        <span>Amount Of Orders</span>
                        <div class="mw-100"></div>
                        <i class="fa fa-barcode" aria-hidden="true"></i>
                        <div class="mw-100"></div>
                        <span>{{\App\order::all()->count()}}</span>
                    </div>
                </div>
                <div class="item col-lg-2 col-md-3">
                    <div class="item-info text-center">
                        <span>Total Vouchers Used</span>
                        <div class="mw-100"></div>
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        <div class="mw-100"></div>
                        <span>{{\App\voucher::all()->count()}}</span>
                    </div>
                </div>
            </div>
            <div class="d-inline row" id="alertBar">
                <div class="alert alert-danger d-flex justify-content-between  align-items-center" role="alert">
                    <div class="warningLabel ">
                        <p class="d-inline">There are  <span class="badge badge-warning badge-pill">{{\App\Warehouse::all()->where('supply','<','4')->count()}}</span>
                            products low on stock!</p>
                    </div>
                    <div class="warningButtons">
                        <a class="btn btn-warning d-inline" href="{{ route('lowStockList')  }}">More Info!</a>
                        <button id="hide" class="btn btn-warning fa fa-times"></button>
                    </div>
                </div>
            </div>

            <div class="container indexTitle col-12">
                <h2>MOST POPULAR PRODUCTS</h2>
            </div>
            <div class="row row-sizer-userinfo">
                @foreach($warehouseProducts as $product )
                    <div class="col-4 product-info">
                        <div class="item-info">
                            <div class="form-inline">
                                <div class="col-9 img-preview">
                                    <img width="90%" src="{{$product[0]->warehouse->product->img}}" alt="">
                                </div>
                                <div class="col-1">
                                    <p><b>Sold:</b></p>
                                    <p>{{$product[0]->warehouse->price}}</p>
                                    @foreach($amounts as $amount)
                                        @if($amount[1] == $product[0]->warehouse_id)
                                            <p>{{$amount[0]}}</p>
                                        @endif

                                    @endforeach
                                    <p>{{$product[0]->warehouse_id}}</p>
                                </div>
                                <div class="desc">{{$product[0]->description}}
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <a href="{{action('WarehouseController@edit', $product[0]->warehouse->id)}}">
                                    <button class="btn btn-info mr-1">Edit Product</button>
                                </a>

                                <a href="{{action('DashboardController@show', $product[0]->warehouse->product->id)}}">
                                    <button class="btn btn-info mr-1">Show Product</button>
                                </a>
                                <form action="{{action('WarehouseController@destroy', $product[0]->id)}}"  class="form-inline" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <input type="hidden" name="delete" value="{{$product[0]->warehouse->id}}">
                                    <input class="btn btn-danger" type="submit" value="Delete Product">
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{--{{$warehouseProducts->links()}}--}}
            <div class="container indexTitle col-12">
                <h2>LOW ON STOCK</h2>
            </div>
            <div class="row row-sizer-userinfo">
                @foreach($productsLow->sortBy('supply') as $productLow)
                    <div class="col-4 product-info">
                        <div class="item-info">
                            <div class="form-inline">
                                <div class="img-preview col-9">
                                    <img width="90%" src="{{$productLow->product->img}}" alt="">
                                </div>
                                <div class="col-1">
                                    <p><b>price:</b></p>
                                    <p>{{$productLow->price}}</p>
                                    <p><b>stock:</b></p>
                                    <p>{{$productLow->supply}}</p>
                                </div>
                                <div class="desc">{{$productLow->product->description}}
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <a href="{{action('WarehouseController@edit', $productLow->product_id)}}">
                                    <button class="btn btn-info" style="margin-right: 5px">Edit Product</button>
                                </a>
                                <a href="{{action('DashboardController@show', $productLow->product_id)}}">
                                    <button class="btn btn-info" style="margin-right: 5px">Show Product</button>
                                </a>
                                <form action="{{action('WarehouseController@destroy', $productLow->product_id)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <input type="hidden" name="delete" value="{{$productLow->product_id}}">
                                    <input class="btn btn-danger" type="submit" value="Delete Product">
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{--{{$productsLow->appends(['sort' => 'supply'])->links()}}--}}

            <div class="container indexTitle col-12">
                <h2>MOST LOGINS FROM HOUSES</h2>
            </div>
            <div class="row row-sizer-userinfo">
                <div class="col-lg-2"></div>
                <div class="item col-lg-2 col-md-3">
                    <div class="item-info text-center">
                        <span>Login Ravens</span>
                        <div class="mw-100"></div>
                        <i class="fa fa-paper-plane justified-content-center" aria-hidden="true"></i>
                        <div class="mw-100"></div>
                        <span>0</span>
                    </div>
                </div>
                <div class="item col-lg-2 col-md-3">
                    <div class="item-info text-center">
                        <span>Login Vikings</span>
                        <div class="mw-100"></div>
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        <div class="mw-100"></div>
                        <span>0</span>
                    </div>
                </div>
                <div class="item col-lg-2 col-md-3">
                    <div class="item-info text-center">
                        <span>Login Dragons</span>
                        <div class="mw-100"></div>
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        <div class="mw-100"></div>
                        <span>0</span>
                    </div>
                </div>

                <div class="item col-lg-2 col-md-3">
                    <div class="item-info text-center">
                        <span>Login Serpents</span>
                        <div class="mw-100"></div>
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        <div class="mw-100"></div>
                        <span>0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>

    const btnHide  = document.getElementById('hide');
    const alertBar = document.getElementById('alertBar');
    btnHide.addEventListener('click', () => {
        alertBar.classList.add('d-none')
        alertBar.classList.remove('d-inline')
        alertBar.classList.remove('row')
    });
</script>
@endsection