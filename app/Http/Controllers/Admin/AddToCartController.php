<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Order,SubCategory,OrderDetailOption,OrderDetailAddition,OrderDetailOther};
class AddToCartController extends Controller
{
    public function addToCart(Request $request)
    {

        //   Session()->forget('addToCart');
        // return back();
        $item = (object)[
            'sub_category_id' => $request->sub_category_id,
            'canteen_info_id' => $request->canteen_info_id,
            'options' => $request->options,
            'additions' => $request->additions,
            'other' => $request->other,
            'qty' =>'1',
        ];

        $items=[];
        $sameItemkey=null;

        if(session()->has('addToCart')){
            foreach(session()->get('addToCart') as $addToCartItem){
                array_push($items,$addToCartItem);
            }
        }
        foreach ($items as $key => $value) {
            if ($value->sub_category_id == $item->sub_category_id) {
                $sameItemkey = $key;
            }
        }

        if ($sameItemkey === null) {
            array_push($items, $item);
        } elseif($sameItemkey !== null) {
            $items[$sameItemkey]->qty += 1;
        }

        session()->put('addToCart', $items);
        return back();


    }

    public function checkOut(){
        return view('users.check-out');

    }
    public function removeItem($id){
        $subCategoryId=$id;
        $items=session()->get('addToCart');
        foreach(Session()->get('addToCart') as $key=>$value){
            if($value->sub_category_id == $subCategoryId){
               unset($items[$key]);

            }

        }
        session()->put('addToCart',$items);
        return back();
    }

}
