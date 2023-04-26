<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Catagory;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\SendEmailNotification;
use Notification;
use Illuminate\Support\Facades\Auth;

use PDF;

class AdminController extends Controller
{
    public function view_catagory()
    {
      if(Auth::id())
      {
        $data=catagory::all();

        return view('admin.catagory',compact('data'));

      }
      else
      {
        return redirect('login');
      }
    }
    public function add_catagory(Request $request)
    {

        $data=new Catagory;
        $data->catagory_name=$request->catagory;
       $data->save();

       return redirect()->back()->with('message','Catagory Added Successfully');
    }

    public function delete_catagory($id)
    {
       $data=catagory::find($id);
       $data->delete();
       return redirect()->back()->with('delete','catagory Deleted Succesfully');
    }
    public function view_product()
    {
        $catagory=catagory::all();
        return view('admin.product',compact('catagory'));
    }
    public function add_product(Request $request)
    {
       $product=new product;
       $product->tittle=$request->tittle;
       $product->description=$request->description;
       $product->price=$request->price;
       $product->quantity=$request->quantity;
       $product->discount_price=$request->discount_price;
       $product->catagory=$request->catagory;
       $image=$request->image;
       $imagename=time().'.'.$image->getClientOriginalExtension();
       $request->image->move('product',$imagename);
       $product->image=$imagename;
       $product->save();
       return redirect()->back()->with('message','Product Added Succesfully');
    }

  public function show_product()
  {
    $product=product::all();
    return view('admin.show_product',compact('product'));
  }
  public function delete_product($id)
  {
    $product=product::find($id);
    $product->delete();
    return redirect()->back()->with('delete','product Deleted Succesfully');
  }

  public function update_product($id)
  {
    $product=product::find($id);
    $catagory=catagory::all();

    return view('admin.update_product',compact('product','catagory'));
  }
  public function update_product_confirm(Request $request,$id)
  {
    if(Auth::id())
    {
      $product=product::find($id);
      $product->tittle=$request->tittle;
      $product->description=$request->description;
      $product->catagory=$request->catagory;
      $product->quantity=$request->quantity;
      $product->price=$request->price;
      $product->discount_price=$request->discount_price;
      $image=$request->image;
      if($image)
      {
          $imagename=time().'.'.$image->getClientOriginalExtension();
          $request->image->move('product',$imagename);
  
          $product->image=$imagename;
      }
  
      $product->save();
  
      return redirect()->back()->with('message','product Update Succesfully');
    }
    else
    {
      return redirect('login');
    }

  }

  public function order()
  {
    $order=Order::all();

    return view('admin.order',compact('order'));
  }

  public function delivered($id)
  {
    $order=Order::find($id);
    $order->delivery_status="delivered";
    $order->payment_status='Paid';
    $order->save();

    return redirect()->back();
  }
  public function print_pdf($id)
  {
    $order=Order::find($id);
    $pdf=PDF::LoadView('admin.pdf',compact('order'));


    return $pdf->download('order_details.pdf');
  }
  public function send_email($id)
  {
    $order=order::find($id);
    return view('admin.email_info',compact('order'));
  }
  public function send_user_email(Request $request,$id)
  {
    $order=order::find($id);
    $details=[
        'greeting'=>$request->greeting,
        'Fristline'=>$request->Fristline,
        'Body'=>$request->Body,
        'button'=>$request->button,
        'url'=>$request->url,
        'last'=>$request->last,


    ];
    Notification::send($order,new SendEmailNotification($details));

    return redirect()->back();
  }
  public function search(Request $request)

  {
    $searchtext=$request->search;
    $order=order::where('name','LIKE',"%$searchtext%")->orWhere('product_title','LIKE',"%$searchtext%")->get();
    return view('admin.order',compact('order'));

  }

}
