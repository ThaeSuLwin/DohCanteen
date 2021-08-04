<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{CanteenOwner,CanteenInfo};
use Str;
use Image;
use Illuminate\Support\Facades\Storage;
class CanteenOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $canteenOwners=CanteenOwner::withTrashed()->paginate(10);
        return view('admins.canteenOwners.index',compact('canteenOwners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.canteenOwners.create-edit');
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
            'name' => 'required',
            'license'=> 'required',
            'nationality_number'=> 'required',
            'phone_number_one'=> 'required',
            'phone_number_two'=> 'required',
            'address' => 'required',
            'image'=> 'required',
        ]);

        $ext=$request->image->getClientOriginalExtension();
        $name=Str::random(32);
        $fileName= $name.'.'.$ext;
        $image=Image::make($request->image);
        
        $image->save(public_path('images/'.$fileName));
        $pathName=$image->dirname.'/'.$image->basename;
        Storage::putFileAs('public/canteen_owner_images',$pathName , $fileName);
        $image->destroy();
        unlink($pathName);

        $canteenOwner=new CanteenOwner;
        $canteenOwner->name=$request->name;
        $canteenOwner->license=$request->license;
        $canteenOwner->nationality_number=$request->nationality_number;
        $canteenOwner->phone_number_one=$request->phone_number_one;
        $canteenOwner->phone_number_two=$request->phone_number_two;
        $canteenOwner->address=$request->address;
        $canteenOwner->image=$fileName;
        $canteenOwner->save();
        return redirect('admin/canteenOwner');
        
       
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
        $canteenOwner = CanteenOwner::findorFail($id);
        return view('admins.canteenOwners.create-edit',compact('canteenOwner'));
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
            'name' => 'required',
            'license'=> 'required',
            'nationality_number'=> 'required',
            'phone_number_one'=> 'required',
            'phone_number_two'=> 'required',
            'address' => 'required',
            'image'=> 'required',
        ]);

        $canteenOwner=CanteenOwner::findorFail($id);
        if($request->image){
        $ext=$request->image->getClientOriginalExtension();
        $name=Str::random(32);
        $fileName= $name.'.'.$ext;
        $image=Image::make($request->image);
        
        $image->save(public_path('images/'.$fileName));
        $pathName=$image->dirname.'/'.$image->basename;
        Storage::putFileAs('public/canteen_owner_images',$pathName , $fileName);
        $image->destroy();
        unlink($pathName);
        $canteenOwner->image=$fileName;
        }
      
        $canteenOwner->name=$request->name;
        $canteenOwner->license=$request->license;
        $canteenOwner->nationality_number=$request->nationality_number;
        $canteenOwner->phone_number_one=$request->phone_number_one;
        $canteenOwner->phone_number_two=$request->phone_number_two;
        $canteenOwner->address=$request->address;
        
        $canteenOwner->update();
        return redirect('admin/canteenOwner');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $canteenOwner=canteenOwner::withTrashed()->find($id);
    $canteenOwner->trashed() ? [$canteenOwner->restore()] : [$canteenOwner->delete()];
    return back();
    }
}
