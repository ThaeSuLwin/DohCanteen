<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Order,SubCategory,OrderDetailOption,OrderDetailAddition,OrderDetailOther};
use Auth;
class OrderController extends Controller
{
    public function orderStore(Request $request)
    {
         dd($request->all());
        
            $order=new Order;
            $order->user_id = Auth::user()->id;
            $subCategory = SubCategory::findOrFail($request->sub_category_id);
            $canteenInfo = $subCategory->canteenInfo;
            $category = $subCategory->category;
            $order->canteen_info_id=$canteenInfo->id;
            $order->category_id=$category->id;
            $order->sub_category_id=$request->sub_category_id;
            $order->quantity = $request->quantity;
           
            $order->save();
            
            // $orders = Order::all();
            // Session()->put('orders',$orders);

            foreach($request->options as $option)
            {
            
            $orderDetailOption = new OrderDetailOption;
            $orderDetailOption->order_id = $order->id;
            $orderDetailOption->option_id = $option;
            // dd($request->options);
            $orderDetailOption->save();
            }
            // die();
            foreach($request->additions as $addition)
            {
            $orderDetailAddition = new OrderDetailAddition;
            $orderDetailAddition->order_id = $order->id;
            $orderDetailAddition->addition_id = $addition;
            $orderDetailAddition->save();
            }

            $orderDetailOther = new OrderDetailOther;
            $orderDetailOther->order_id = $order->id;
            $orderDetailOther->other = $request->other;
            $orderDetailOther->save();
            

            return back();
    }
    

    public function checkOrder($id)
    {
        $orders = Order::where('canteen_info_id',$id)->get();
      
        return view('users.check-order',compact('orders'));
    }

    public function orderUpdate(Request $request , $id){
        // dd('Hi');
        //    dd($request->all());
                $order=Order::findOrFail($id);
                $subCategory = SubCategory::findOrFail($request->sub_category_id);
                $canteenInfo = $subCategory->canteenInfo;
                // dd($canteenInfo);
                $category = $subCategory->category;
                $order->canteen_info_id=$canteenInfo->id;
                $order->category_id=$category->id;
                $order->sub_category_id=$request->sub_category_id;
                
                // $order->option_id=$request->option_id;
                // $order->addition_id=$request->addition_id;
                $order->other=$request->other;
                $order->quantity=$request->quantity;
                // $order->table_id=$request->table_id;
                // $order->total_price=$request->total_price;
                $order->update();
                $subCategory->options()->attach($request->option);
                $subCategory->additions()->attach($request->addition);
               
                return back();
        }
        
        public function orderDelete(Request $request , $id)
        {
            // dd('Hi');
            $order = Order::findOrFail($id);
            $order->delete();
            return back();
        }
}
