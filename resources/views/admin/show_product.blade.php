<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
@include('admin.style')
<style>
    .center
    {
        margin: auto;
        width: 50%;
        border: 2px solid white;
        text-align: center;
        margin-top: 40px;
    }
    .font_size
    {
    text-align: center;
    font-size: 40px;

    }
    .img_size
    {
      width: 150px;
      height: 150px;
    }
    .th_color
    {
        background: skyblue;
    }
    .th_deg
    {
        padding: 30px
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
           
               @if(session()->has('delete'))
               <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
             {{ session()->get('delete') }}
                 </div>
              @endif

                <h1 class="font_size">All Product</h1>

        <table class="center">
    <tr class="th_color">
        <th class="th_deg">Title</th>
        <th class="th_deg">description</th>
        <th class="th_deg">quantity</th>
        <th class="th_deg">catagory</th>
        <th class="th_deg">price</th>
        <th class="th_deg">discount</th>
        <th class="th_deg">image</th>
        <th class="th_deg">Delete</th>
        <th class="th_deg">Edit</th>
    </tr>
    @foreach ($product as $product )
    <tr>
        <td>{{$product->tittle}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->catagory}}</td>
        <td>{{$product->quantity}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->discount_price}}</td>
        <td>
            <img class="img_size" src="/product/{{$product->image}}">
        </td>
        <td>
            <a class="btn btn-danger" onclick="return confirm('are you sure delete this')" href="{{url('delete_product',$product->id)}}">Delete</a>
        </td>
        <td>
            <a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a>
        </td>

    </tr>
    @endforeach
</table>


            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
 @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
