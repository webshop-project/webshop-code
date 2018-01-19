<?php
    $user = App\User::where('id','=', $order->user_id)->get();


?>


<table>
    <tr>
        <td>Bought at</td>
        <td>Price</td>
        <td>Order number</td>
        <td>Amount</td>
        <td></td>

    </tr>
    <tr>
        <td>{{$order->bought_at}}</td>
        <td>{{$order->price}}</td>
        <td>{{$order->orderNumber}}</td>
        <td>{{$order->amount}}</td>
        <td></td>
    </tr>

</table>