<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{CanteenOwner,TableType,CanteenInfo,EmployeeType};
use Str;
use Image;
use Storage;
class CanteenInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $canteenInfos=CanteenInfo::withTrashed()->paginate(10);
        return view('admins.canteenInfos.index',compact('canteenInfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $canteenOwners=Canteenowner::all();
        $tableTypes=TableType::all();
        $employeeTypes=EmployeeType::all();
        return view('admins.canteenInfos.create-edit',compact('canteenOwners','tableTypes','employeeTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'canteen_owner_id'=> 'required',
            'name'=> 'required',
            'address'=> 'required',
            'phone_number'=> 'required',
            'email'=> 'required',
            'description'=> 'required',
            'image'=> 'required'
        ]);
        // dd($request->all());
        $ext=$request->image->getClientOriginalExtension();
        $name=Str::random(32);
        $fileName= $name.'.'.$ext;
        $image=Image::make($request->image);
        
        $image->save(public_path('images/'.$fileName));
        $pathName=$image->dirname.'/'.$image->basename;
        Storage::putFileAs('public/canteen_info_images',$pathName , $fileName);
        $image->destroy();
        unlink($pathName);
        $canteenInfo=new CanteenInfo;
        $canteenInfo->canteen_owner_id=$request->canteen_owner_id;
        $canteenInfo->name=$request->name;
        $canteenInfo->address=$request->address;
        $canteenInfo->phone_number=$request->phone_number;
        $canteenInfo->email=$request->email;
        $canteenInfo->description=$request->description;
        $canteenInfo->image=$fileName;
        $canteenInfo->save();
        $canteenInfo->Tabletypes()->attach($request->tableType); 
        $canteenInfo->employeeTypes()->attach($request->employeeType);
        return redirect('admin/canteenInfo');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $canteenInfos=CanteenInfo::findorFail($id);
        return view('Admin.canteeninfos.show',compact('canteenInfos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $canteenInfo=CanteenInfo::findorFail($id);
        $canteenOwners=CanteenOwner::all();
        $tableTypes=TableType::all();
        $employeeTypes=EmployeeType::all();
        return view('admins.canteenInfos.create-edit',compact('canteenInfo','canteenOwners','tableTypes','employeeTypes'));
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
            'canteen_owner_id'=> 'required',
            'name'=> 'required',
            'address'=> 'required',
            'phone_number'=> 'required',
            'email'=> 'required',
            'description'=> 'required',
            'image'=> 'required'
        ]);
        $canteenInfo=CanteenInfo::findOrFail($id);
        if($request->image){
        $ext=$request->image->getClientOriginalExtension();
        $name=Str::random(32);
        $fileName= $name.'.'.$ext;
        $image=Image::make($request->image);
        
        $image->save(public_path('images/'.$fileName));
        $pathName=$image->dirname.'/'.$image->basename;
        Storage::putFileAs('public/canteen_info_images',$pathName , $fileName);
        $image->destroy();
        unlink($pathName);
        $canteenInfo->image=$fileName;
        }
        $canteenInfo->canteen_owner_id=$request->canteen_owner_id;
        $canteenInfo->name=$request->name;
        $canteenInfo->address=$request->address;
        $canteenInfo->phone_number=$request->phone_number;
        $canteenInfo->email=$request->email;
        $canteenInfo->description=$request->description;
        $canteenInfo->update();
        $canteenInfo->tableTypes()->sync($request->tableType); 
        $canteenInfo->employeeTypes()->sync($request->employeeType);
        return redirect('admin/canteenInfo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $canteenInfo=CanteenInfo::withTrashed()->find($id);
        $canteenInfo->trashed() ? [$canteenInfo->restore()] : [$canteenInfo->delete()];
        return back();
    }
}
