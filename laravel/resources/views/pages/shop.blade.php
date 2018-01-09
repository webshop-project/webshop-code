@extends('layouts/pagesMaster')

@section('title')
    Shop
@endsection




@section('content')


<h1 id="counter">0</h1>
    <div class="container d-inline">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif
        <div class="col">
            <div class="row">
                <div class=" col menuList">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{url('/shop/cat',1)}}">Caps</a></li>
                        <li class="list-group-item"><a href="{{url('/shop/cat',2)}}">Keycords</a></li>
                        <li class="list-group-item"><a href="{{url('/shop/cat',3)}}">Mugs</a></li>
                        <li class="list-group-item"><a href="{{url('/shop/cat',4)}}">Phonecases</a></li>
                        <li class="list-group-item"><a href="{{url('/shop/cat',5)}}">Shirts</a></li>
                        <li class="list-group-item"><a href="{{url('/shop/cat',6)}}">USB's</a></li>
                    </ul>
                </div>
                <div class="container col-xs-12 col-sx-12 col-10  d-inline">
                    <div class="selectContainer">
                        <form action="">
                            <select name="houseVal" title="houses" onchange="this.form.submit()" id="houses" class="custom-select">
                                <option selected disabled> Houses:</option>
                                <option value="1">Variable Vikings</option>
                                <option value="2">Database Dragons</option>
                                <option value="3">Recursive Ravens</option>
                                <option value="4">Script Serpents</option>
                            </select>
                        </form>
                    </div>
                    <div class="row">
                        @foreach($products as $product)
                            <div class="block span3 {{$product->house->id}}">
                                <div class="product">
                                        <img src="{{$product->img}}" alt="{{$product->house->name}} {{$product->category->name}}">
                                    <div class="buttons">
                                        <a class="preview btn btn-large btn-info" href="{{action('WarehouseController@show',$product->id)}}"><i class="glyphicon glyphicon-eye-open"></i> View item</a>
                                    </div>
                                </div>
                                <div class="info">
                                    <h4 onclick="count({{$product->id}})">{{$product->house->name}}<br> {{$product->category->name}}
                                    @if(!empty($product->brandModel->name))
                                        {{$product->brandModel->name}}
                                    @endif
                                    </h4>
                                    @foreach($product->warehouse as $price)
                                        @if($loop->first)
                                            <span class="price">€{{number_format($price->price,2,',',' ')}}</span>
                                        @endif
                                    @endforeach
                                    <form action="{{ url('/shop/cart') }}" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <input type="hidden" name="name" value="{{$product->house->name}} {{$product->category->name}}">
                                        <input type="hidden" name="size" value="">
                                        <input type="hidden" name="price" value="">
                                        <input type="submit" class="btn btn-info pull-right" value="Add to Cart">
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>

<script>
    if (typeof(Storage) !== "undefined")
    {
        let test = document.getElementById('counter')
        test.innerHTML = localStorage.clickcount;

        test.addEventListener('click', () => {
            alert('you clicked me!')
        })

    }
    else
    {
        alert('this browser doesnt support out website please install Chrome');
    }
    function count(item)
    {
        if (typeof(Storage) !== "undefined")
        {
            if (localStorage.clickcount)
            {
                document.getElementById('counter').innerHTML = item;
                localStorage.clickcount = Number(localStorage.clickcount)+1;
                localStorage.clickcount = Number(localStorage.clickcount)-2;
            }
            else
            {
                localStorage.clickcount = 0;
            }
        }
        else
        {
            alert('this browser doesnt support out website please install Chrome');
        }
    }
</script>
@endsection