<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{Category,SubCategory,CanteenInfo};

class CategoryController extends Controller
{
    
   
    public function index(){
       
        $categories=Category::paginate(3);

        return view('admins.categories.index',compact('categories'));  
        
    }
    
 
    public function create(){
        $canteenInfos=CanteenInfo::all();
        return view('admins.categories.create-edit',compact('canteenInfos'));

    }

    public function store( Request $request){
        $validatedData = $request->validate([
            'canteen_info_id' => 'required',
            'name' => 'required|unique:categories|max:255',
           
        ]);
        Category::create(request()->all());
        return redirect('admin/index');
    }

    public function edit($id){
        $category=Category::findorFail($id);
        return view('admin.categories.create-edit',compact('category'));

    }
    public function update($id){
        $category=Category::findorFail($id);
         $category->update(request()->all());
         return redirect('admin/index');
        
    }

    public function delete($id){
        $category=Category::findorFail($id);
       $category->trashed() ? [$category->restore()] : [$category->delete()];
       return back();
    }

    public function show($id){
        $subcategories =SubCategory::where('category_id',$id)->paginate(5);
        return view('admins.categories.show',compact('subcategories'));
    }

}
