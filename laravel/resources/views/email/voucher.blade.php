<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        img{
            width: 100%;
        }
    </style>
</head>
<body>
    <img src="{{ $message->embed(public_path() . '/img/voucher_top.png') }}"alt="">
        <h1 style="text-align: center;">{{$user}}</h1>
        <h2 style="text-align: center;">Here is your voucher code:</h2>
        <h3 style="text-align: center;">{{$code}}</h3>
        <h4 style="text-align: center;">This code is {{$value}} euro worth</h4>
        <p style="text-align: center;">This voucher is valid sice {{$startDate}} until {{$endDate}}</p>
    <img src="{{ $message->embed(public_path() . '/img/voucher_botom.png') }}" alt="">
</body>
</html>