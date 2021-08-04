<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Customer,Order,Item,Category,CanteenInfo,SubCategory};

class CanteenController extends Controller
{
   public function landing()
   {
       return view('users.landing');

   }

   public function canteenInfo()
   {
    $canteenInfos=Canteeninfo::paginate(4);
    return view('users.canteenInfo',compact('canteenInfos'));
    }

    public function menu()
    {
     $categories=Category::paginate(4);
     return view('UI.menu',['categories'=> $categories]);
    }
   
//    public function list(){
//        return view('UI.canteen');
//    }

   public function login()
   {
       
       return view('UI.login');
   }
 
   public function create()
   {
    $customers=Customer::all();
    return view('UI.register',['customers'=> $customers]);
    }
   
    public function store( Request $request)
    {
   $request->validate([
        'name' => 'required|unique:customers|max:255',
        'email' => 'required|unique:customers',
        'password' => 'required',
        'phone_no' => 'required',
        'address' => 'required|max:255',
    ]);

    Customer::create(request()->all());
    return redirect('UI/landing');
}

    public function category($id)
    {
        // dd($id);
    $canteenInfo=CanteenInfo::findOrFail($id);
    $categories =Category::where('canteen_info_id',$id)->get();
    $subCategories=SubCategory::where('canteen_info_id',$id)->get();
    $order = Order::where('canteen_info_id',$id)->get();
    return view('users.category-show',compact('categories','subCategories','canteenInfo','order'));
    }

    public function subCategory($canteenInfoId,$id)
    {
        $canteenInfo=CanteenInfo::findOrFail($canteenInfoId);
        $categories =Category::where('canteen_info_id',$canteenInfoId)->get();
        $subCategories=SubCategory::where('category_id',$id)->get();
        return view('users.subcat-show',compact('subCategories','categories','canteenInfo'));
    }
    public function look($canteenId,$categoryId)
{
    $subcategories =Subcategory::where('cat_id',$categoryId)->paginate(5);
    return view('UI.menu',compact('subcategories','canteenId'));
}










}
