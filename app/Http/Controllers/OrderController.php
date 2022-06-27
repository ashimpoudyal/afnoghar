<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DataTables;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class OrderController extends Controller
{
   // Order Inder 
     public function order(){
         $orders = Order::latest()->get();
         return view ('admin.order.index', compact('orders'));
     }





     // Order Inder 
     public function view($id){
         $orders = Order::findOrFail($id);
         return view ('admin.order.view', compact('orders'));
     }



      // Edit Order Status
    public function edit($id){
        $orders = Order::findOrFail($id);
        return view ('admin.order.edit', compact('orders'));
    }




     // Update
   public function update(Request $request , $id){
        $data = $request->all();

        $orders = Order::findOrFail($id);


         if (empty($data['order_status'])){
            $orders->order_status = 0;
        } else {
            $orders->order_status = 1;
        
        }
        
       




        $orders->save();

        Session::flash('success_message', 'Order Status Has Been Updated Successfully');
        return redirect()->back();

    }





     // Delete Category
    public function delete($id){
         $orders = Order::findOrFail($id);
         $orders->delete();


         
        Session::flash('success_message', 'Order Has Been deleted Successfully');
        return redirect()->back();
    }




}
