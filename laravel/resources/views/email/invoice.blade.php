<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="center" style="text-align: center">
    <img src="{{$message->embed(public_path() . '/img/voucher_top.png')}}" alt="">
    <div class="head">
        <h2 class="">Geachte {{$name}}</h2>
    </div>
    <div class="content">
        <p>Bedankt voor uw aankoop bij Amo-Webshop</p>
        <p>In de bijlagen vindt u de factuur waarmee u uw bestelling kunt ophalen.</p>
    </div>
    <div class="foot">
        <p>Meer informatie nodig? Kijk op: <a href="{{$link}}">FourHouses-shop</a></p>
        <p>Met vriendelijke groet, FourHouses-shop</p>
    </div>

    <img src="{{$message->embed(public_path() . '/img/voucher_botom.png')}}" alt="">
</div>
</body>
</html>