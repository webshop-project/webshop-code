<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voucher Code</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/sandstone/bootstrap.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/4/sandstone/bootstrap.css">
</head>
<body>
{{--firstName--}}
{{--lastName--}}
{{--code--}}
{{--value--}}
{{--startDate--}}
{{--endDate--}}
<div class="center" style="text-align: center">

    <img src="{{ $message->embed($topImage)}}" alt="Voucher top image">
    <div class="head">
        <h2 class="">Geachte {{$firstName}} {{$lastName}}</h2>
        <p class="">Hierbij ontvangt u uw voucher code.</p>
    </div>
    <div class="content">
        <p><strong>{{$code}}</strong></p>
        <small class="form-text text-muted ">Bovenstaande code is {{$value}} euro waard.</small>
        <p class="text-muted">Deze code kun u gebruiken vanaf: <strong>{{$startDate}}</strong> tot <strong>{{$endDate}}</strong></p>
    </div>
        <div class="foot">
            <p>Met vriendelijke groet, FourHouses-shop</p>
        </div>
    <img src="{{ $message->embed($bottomImage) }}" alt="Voucher bottom image">

</div>
</body>
</html>
