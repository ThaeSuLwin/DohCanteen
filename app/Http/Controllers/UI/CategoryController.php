<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Category,CanteenInfo,SubCategory};
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::paginate(3);
        return view('users.categories.index',compact('categories'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $canteenInfos=CanteenInfo::all();
        return view('users.categories.create-edit',compact('canteenInfos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
      $request->validate([
            'canteen_info_id' => 'required',
            'name' => 'required|unique:categories|max:255',
           
        ]);

       $category = new Category;
       $category->canteen_info_id=$request->canteen_info_id;
       $category->name=$request->name;
       $category->save();
        return redirect('user/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::findorFail($id);
        $canteenInfos=CanteenInfo::all();
        return view('users.categories.create-edit',compact('category','canteenInfos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'canteen_info_id' => 'required',
            'name' => 'required|unique:categories|max:255',
           
        ]);
            
       $category = Category::findOrFail($id);
       $category->canteen_info_id=$request->canteen_info_id;
       $category->name=$request->name;
       $category->update();
        return redirect('user/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        $category->trashed() ? [$category->restore()] : [$category->delete()];
        return back();
    }
}
