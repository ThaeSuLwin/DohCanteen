<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Order,SubCategory,OrderDetailOption,OrderDetailAddition,OrderDetailOther};
class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
       $cart = Session()->get('cart');
       $cart[] = array(
        "id" => $product[0]->id,
        "nama_product" => $product[0]->nama_product,
        "harga" => $product[0]->harga,
        "pict" => $product[0]->pict,
        "qty" => 1,
    );
    }
}
