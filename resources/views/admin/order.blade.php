<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
@include('admin.style')
<style>

.title_deg
{
    text-align: center;
    font-size: 25px;
    font-weight: bold;
    padding-bottom: 30px;
}
.table_deg
{
    border: 2px solid white;
    
    margin: auto;

    text-align: center;

}
.th_deg
{
    background-color: skyblue;
}


</style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
@include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
      @include('admin.header')
        <!-- partial -->
        <div class ="main-panel">
            <div class="content-wrapper">

<h1 class="title_deg">All Orders</h1>
<div style="padding-left:40%; padding-bottom: 30px;">
    <form action="{{url('search')}}" method="GET">
        @csrf
        <input style="color:black;" type="text" name="search" placeholder="search">
        <input type="submit" value="search" class="btn btn-outline-primary" >

    </form>
</div>
<table class="table_deg">

<tr class="th_deg">
    <th >Name</th>
    <th >Email</th>
    <th >Phone</th>
    <th >Address</th>
    <th >Product_title</th>
    <th >Quantity</th>
    <th >Price</th>
    <th >Image</th>
    <th >Payment status</th>
    <th >Delivery status</th>
    <th >Delivered</th>
    <th >Print Pdf</th>
    <th >Send Email</th>


</tr>
@forelse ($order as $order )


<tr>
    <td style="padding: 10px;" >{{$order->name}}</td>
    <td style="padding: 10px;" >{{$order->email}}</td>
    <td style="padding: 10px;" >{{$order->phone}}</td>
    <td style="padding: 10px;" >{{$order->address}}</td>
    <td style="padding: 10px;" >{{$order->product_title}}</td>
    <td style="padding: 10px;" >{{$order->quantity}}</td>
    <td style="padding: 10px;" >{{$order->price}}</td>
    <td style="padding: 10px;" >
        <img src="/product/{{$order->image}}">
    </td>
    <td>{{$order->payment_status}}</td>
    <td>{{$order->delivery_status}}</td>
    <td style="padding: 10px;" >
        @if($order->delivery_status=='processing')
        <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Are you sure this product is delivered')" class="btn btn-primary">Delivered</a>
        @else
        <p style="color:green;">Delivered</p>

        @endif
    </td>


    <td>
        <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print Pdf</a>
    </td>
    <td >
        <a href="{{url('send_email',$order->id)}}" class="btn btn-info">Send Email</a>
    </td>


</tr>
@empty
<tr>

<td colspan="16">
    No Data Found
</td>


</tr>
@endforelse


</table>



            </div>
        </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
 @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
