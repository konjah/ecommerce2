<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
@include('admin.style')
<style>
    label
    {
display: inline-block;
width: 150px;
font-size: 15px;
font-weight: bold;

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
<h1 style="text-align: center; font-size: 25px;">End Email To:{{$order->email}}</h1>


<form action="{{url('send_user_email',$order->id)}}" method="POST">
    @csrf
<div style="padding-left: 35%; padding-top:30px;">
    <label>Email Greeting</label>
    <input style="color:black" type="text" name="greeting">
</div>

<div style="padding-left: 35%; padding-top:30px;">
    <label>Email Fristline</label>
    <input style="color:black" type="text" name="Fristline">
</div>

<div style="padding-left: 35%; padding-top:30px;">
    <label>Email Body:</label>
    <input style="color:black" type="text" name="Body">
</div>

<div style="padding-left: 35%; padding-top:30px;">
    <label>Email Button Name:</label>
    <input style="color:black" type="text" name="button">
</div>

<div style="padding-left: 35%; padding-top:30px;">
    <label>Email url:</label>
    <input style="color:black" type="text" name="url">
</div>

<div style="padding-left: 35%; padding-top:30px;">
    <label>Email Last line:</label>
    <input style="color:black" type="text" name="last">
</div>
<div style="padding-left: 35%; padding-top:30px;">

    <input type="submit" name="Send Email" class="btn btn-primary">
</div>
</form>





            </div>
        </div>


    <!-- container-scroller -->
    <!-- plugins:js -->
 @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
