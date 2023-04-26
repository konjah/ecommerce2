<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
@include('admin.style')
<style type="text/css">

.div_center
{
    text-align: center;
    padding-top: 40px;
}
.h2_font
{
    font-size: 40px;
    padding-bottom: 40px;
}
.input_color
{
    color: black;
}
.catagory
{
    width: 50%;
    margin: auto;
    text-align: center;
    margin-top: 30px;
    border:3px solid white;
}

</style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
@include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- navbar -->
      @include('admin.header')
          <!-- container -->
     <div class ="main-panel">
        <div class="content-wrapper">
            @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{ session()->get('message') }}
            </div>
         @endif
         @if(session()->has('delete'))
         <div class="alert alert-danger">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
       {{ session()->get('delete') }}
           </div>
        @endif
         <div class="div_center">
            <h2 class="h2_font">Add Catagory</h2>
            <form action="{{url('/add_catagory')}}" method="POST">
                @csrf
                <input type="text" name="catagory" placeholder="write catagory" class="input_color">
                <input type= "submit" name="submit" value="Add Catagory" class="btn btn-primary">

            </form>
         </div>
         <table class="catagory">

              <tr>
                <td >Catagory Name</td>
                <td >Action</td>
              </tr>
              @foreach ($data as $data)

              <tr>
                  <td>{{$data->catagory_name}}</td>
                  <td>
                      <a onclick="return confirm('Are You Sure To Delete This')" class ="btn btn-danger" href="{{url('delete_catagory',$data->id)}}">delete</a>
                    </td>
                </tr>

                @endforeach

          </table>
        </div>
     </div>
    <!-- plugins:js -->
 @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
