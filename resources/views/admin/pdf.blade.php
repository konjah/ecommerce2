<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>order Details</h1>

Customer Name:<h3>{{$order->name}}</h3>
Customer phone:<h3>{{$order->phone}}</h3>
Customer address:<h3>{{$order->address}}</h3>
 Product:<h3>{{$order->product_title}}</h3>
 quantity:<h3>{{$order->quantity}}</h3>
 price:<h3>{{$order->price}}</h3>
payment_status:<h3>{{$order->payment_status}}</h3>
delivery_status:<h3>{{$order->delivery_status}}</h3>

<img src="product/{{$order->image}}">

</body>
</html>
