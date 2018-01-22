
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
      integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

<h1>Order number:{{$invoiceInfo->title}}</h1>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <td>Item Name</td>
        <td>Price</td>
        <td>Amount</td>
    </tr>
    </thead>
    <tr>



        @foreach($orderInfo as $orderItem)
            <td scope="row"></td>
            <td>{{$orderItem->item_name}}</td>
            <td>{{$orderItem->item_price}}</td>
            <td>{{$orderItem->item_qty}}</td>
            @endforeach
        <td></td>
        <td></td>
        <td></td>
            <td>Bought at:{{$current_time}}</td>

    </tr>

</table>