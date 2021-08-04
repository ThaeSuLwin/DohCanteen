<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\{OrderDetailOther,OrderDetailAddition,OrderDetailOption,OrderDetail};

class OrderController extends Controller
{
    public function store()
    {
        $addToCartItems = session()->get('addToCart');
        foreach($addToCartItems as $addToCartItem)
        {
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->canteen_info_id =$addToCartItem->canteen_info_id;
            $order->sub_category_id =$addToCartItem->sub_category_id;
            $order->qty =$addToCartItem->qty;
            $order->save();

            if($addToCartItem->options != null)
            {
                foreach($addToCartItem->options as $option)
            {
                $orderDetailOption = new OrderDetailOption;
                $orderDetailOption->order_id = $order->id;
                $orderDetailOption->option_id = $option;
                $orderDetailOption->save();
            }
            }

            if($addToCartItem->additions != null)
            {
                foreach($addToCartItem->additions as $addition)
                {
                    $orderDetailAddition = new OrderDetailAddition;
                    $orderDetailAddition->order_id = $order->id;
                    $orderDetailAddition->addition_id = $addition;
                    $orderDetailAddition->save();
                }

            }

            if($addToCartItem->other != null)
            {
                $orderDetailOther = new OrderDetailOther;
                $orderDetailOther->order_id = $order->id;
                $orderDetailOther->other = $addToCartItem->other;
                $orderDetailOther->save();
            }

        }

        session()->put('addToCart',[]);
        return redirect('/');

    }

    public function order()
    {
        $orders = Order::paginate(10);
        return view('admins.orders.order',compact('orders'));
    }

    public function orderDetail($id)
    {
        $orderDetail = Order::findOrFail($id);
        // dd($orderDetail);
        $orderDetailOptions = $orderDetail->orderDetailOptions;
        $orderDetailAdditions = $orderDetail->orderDetailAdditions;
        $orderDetailOthers = $orderDetail->orderDetailOthers;

        $subCategoryPrice = $orderDetail->subCategory->price;
        $subCategoryQty = $orderDetail->qty;

        $optionTotalAmount = 0;
        foreach($orderDetailOptions as $orderDetailOption)
        {

            $optionTotalAmount += $orderDetailOption->option->price;
            // echo $optionTotalAmount;
        }

        $additionTotalAmount = 0;
        foreach($orderDetailAdditions as $orderDetailAddition)
        {
            $additionTotalAmount += $orderDetailAddition->addition->price;
        }
        $totalAmount = ($subCategoryPrice + $optionTotalAmount + $additionTotalAmount) * $subCategoryQty;
        // dd($subCategoryQty);
        return view('admins.orders.order-detail',compact('orderDetail','orderDetailOptions','orderDetailAdditions','orderDetailOthers','totalAmount'));
    }
}
