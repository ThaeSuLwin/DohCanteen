<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{SubCategory,Category,Option,SubCategoryOption,CanteenInfo};
use Str;
use Image;
use Illuminate\Support\Facades\Storage;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories=SubCategory::withTrashed()->paginate(10);
        return view('users.subCategories.index',compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $options=Option::all();
        return view('users.subCategories.create-edit',compact('categories','options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
           
            'category_id'=>'required',
            'name'=>'required',
            'description'=> 'required',
            'price'=> 'required',
            'image'=> 'required',
        ]);

        $ext = $request->image->getClientOriginalExtension();
        $name=Str::random(32);
        $fileName=$name.'.'.$ext;
        $image=Image::make($request->image);
        $image->save(public_path('images/'.$fileName));
        $pathName=$image->dirname.'/'.$image->basename;
        Storage::putFileAs('public/subCategory_images',$pathName,$fileName);
        $image->destroy();
        unlink($pathName);
        $subCategory=new SubCategory;
        $subCategory->canteen_info_id=$request->canteen_info_id;
        $subCategory->category_id=$request->category_id;
        $subCategory->name=$request->name;
        $subCategory->description=$request->description;
        $subCategory->price=$request->price;
        $subCategory->image=$fileName;
        $subCategory->save();
        $subCategory->options()->attach($request->option);
        return redirect('user/subCategory');
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
        $subCategory=SubCategory::findorFail($id);
        $categories=Category::all();
        $options=Option::all();
        return view('users.subCategories.create-edit',compact('categories','subCategory','options'));
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
            
            'category_id'=>'required',
            'name'=>'required',
            'description'=> 'required',
            'price'=> 'required',
            'image'=> 'required',
        ]);
        $subCategory=SubCategory::findOrFail($id);
       if($request->image){ 
        $ext = $request->image->getClientOriginalExtension();
        $name=Str::random(32);
        $fileName=$name.'.'.$ext;
        $image=Image::make($request->image);
        $image->save(public_path('images/'.$fileName));
        $pathName=$image->dirname.'/'.$image->basename;
        Storage::putFileAs('public/subCategory_images',$pathName,$fileName);
        $image->destroy();
        unlink($pathName);
        $subCategory->image=$fileName;
       }
       $subCategory->canteen_info_id=$request->canteen_info_id;
        $subCategory->category_id=$request->category_id;
        $subCategory->name=$request->name;
        $subCategory->description=$request->description;
        $subCategory->price=$request->price;
        $subCategory->update();
        $subCategory->options()->sync($request->option);
        return redirect('user/subCategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCategory=SubCategory::withTrashed()->find($id);
        $subCategory->trashed() ? [$subCategory->restore()] : [$subCategory->delete()];
        return back();
    }
}
