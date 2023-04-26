<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/puplic">
@include('admin.style')
<style type ="text/css">

.div_center
{
    text-align: center;
    padding-top: 40px;
}
.font_size
{
    font-size: 40px;
    padding-bottom: 40px;
}
.text_color
{
    color: black;
}
label
{
    display: inline-block;
    width:200px;
}
.div_design
{
padding-bottom: 20px;
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
                @if(session()->has('message'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              {{ session()->get('message') }}
                  </div>
               @endif
                <div class="div_center">
                <h1 class="font_size">Edit Product</h1>
             <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="div_design">
                <label>Title:</label>
                <input class="text_color" type="text" name="tittle"  placeholder="write a title" required="" value="{{$product->tittle}}">
                </div>

                <div class="div_design">
                <label>description:</label>
                <input class="text_color" type="text" name="description"  placeholder="write a description" required="" value="{{$product->description}}">
                </div>

                <div class="div_design">
                <label>price:</label>
                <input class="text_color" type="number" name="price"  placeholder="write a price" required="" value="{{$product->price}}">
                </div>

                <div class="div_design">
                    <label>Discount:</label>
                    <input class="text_color" type="number" name="discount_price"  placeholder="write a Discount" value="{{$product->Discount}}">
                    </div>

                <div class="div_design">
                <label>quantity:</label>
                <input class="text_color" type="number" min="0" name="quantity"  placeholder="write a quantity" required=""value="{{$product->quantity}}">
                </div>

                <div class="div_design">
                <label>Catagory:</label>
                <select class="text_color" name="catagory" required="">
                    <option value="{{$product->quantity}}" selected="">{{$product->quantity}}</option>
                    @foreach ($catagory as $catagory )

                    <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>

                    @endforeach

                </select>
                </div>

                <div class="div_design">
                <label> Current Image:</label>
                <img style="margin:auto" height="100" width="100"  src="/product/{{$product->image}}">
                </div>

                <div class="div_design">
                <label>Image:</label>
                <input type="file" name="image" >
                </div>

                <div class="div_design">

                <input type="submit" value="Edit Product" class="btn btn-primary">
                </div>
            </form>



                </div>
            </div>
            </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
 @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
