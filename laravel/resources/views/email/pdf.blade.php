
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>

@foreach($invoiceInfo as $info)
    <h4>Order number: {{$info->id}}</h4>
    <h4>Order name: {{$info->title}}</h4>
@endforeach
<table>
    <tr>
        <th>Item Name</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Total</th>
    </tr>
    @foreach($orderInfo as $orderItem)
    <tr>
        <td>{{$orderItem->item_name}}</td>
        <td>{{$orderItem->item_price}}</td>
        <td>{{$orderItem->item_qty}}</td>
        <td> </td>
    </tr>
    @endforeach
    @foreach($invoiceInfo as $info)
        <td> </td>
        <td> </td>
        <td> </td>
        <td>{{$info->price}}</td>
    @endforeach
</table>
<p>Ordered at:{{$current_time}}</p>
<p>Order has been successfully paid</p>
<p>Thank you for your purchase at FourHouses shop.</p>
</body>
</html>