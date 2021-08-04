<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Employee,EmployeeType,Gender,CanteenInfo};
use Str;
use Image;
use Illuminate\Support\Facades\Storage;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::withTrashed()->paginate(10);
        return view('users.employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employeeTypes=EmployeeType::all();
        $genders=Gender::all();
        $canteenInfos=CanteenInfo::all();
        return view ('users.employees.create-edit',compact('employeeTypes','genders','canteenInfos'));
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
            'employee_type_id' => 'required',
            'canteen_info_id'=> 'required',
            'name' => 'required',
            'email'=> 'nullable',
            'phone_number'=> 'nullable',
            'nationality_number'=>'nullable',
            'gender_id'=>'nullable',
            'address'=>'nullable',
            'salary'=>'nullable',
            'about_you'=>'nullable',
            'image'=> 'required',
        ]);

        $ext=$request->image->getClientOriginalExtension();
        $name=Str::random(32);
        $fileName= $name.'.'.$ext;
        $image=Image::make($request->image);
        
        $image->save(public_path('images/'.$fileName));
        $pathName=$image->dirname.'/'.$image->basename;
        Storage::putFileAs('public/employee_images',$pathName , $fileName);
        $image->destroy();
        unlink($pathName);
        $employee=new Employee;
        $employee->canteen_info_id=$request->canteen_info_id;
        $employee->employee_type_id=$request->employee_type_id;
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->phone_number=$request->phone_number;
        $employee->nationality_number=$request->nationality_number;
        $employee->gender_id=$request->gender_id;
        $employee->address=$request->address;
        $employee->salary=$request->salary;
        $employee->about_you=$request->about_you;
        $employee->image=$fileName;
        $employee->save();
        return redirect('user/employee');
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
        $employee=Employee::findOrFail($id);
        $employeeTypes=EmployeeType::all();
        $genders=Gender::all();
        $canteenInfos=CanteenInfo::all();
        return view('users.employees.create-edit',compact('employee','genders','canteenInfos','employeeTypes'));
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
            'employee_type_id' => 'required',
            'canteen_info_id'=> 'required',
            'name' => 'required',
            'email'=> 'nullable',
            'phone_number'=> 'nullable',
            'nationality_number'=>'nullable',
            'gender_id'=>'nullable',
            'address'=>'nullable',
            'salary'=>'nullable',
            'about_you'=>'nullable',
            'image'=> 'required',
        ]);

        $employee=Employee::findOrFail($id);

        if($request->image){
        $ext=$request->image->getClientOriginalExtension();
        $name=Str::random(32);
        $fileName= $name.'.'.$ext;
        $image=Image::make($request->image);
        
        $image->save(public_path('images/'.$fileName));
        $pathName=$image->dirname.'/'.$image->basename;
        Storage::putFileAs('public/employee_images',$pathName , $fileName);
        $image->destroy();
        unlink($pathName);
        $employee->image=$fileName;
        }

        $employee->canteen_info_id=$request->canteen_info_id;
        $employee->employee_type_id=$request->employee_type_id;
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->phone_number=$request->phone_number;
        $employee->nationality_number=$request->nationality_number;
        $employee->gender_id=$request->gender_id;
        $employee->address=$request->address;
        $employee->salary=$request->salary;
        $employee->about_you=$request->about_you;
       
        $employee->update();
        return redirect('user/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee=Employee::withTrashed()->find($id);
        $employee->trashed() ? [$employee->restore()] : [$employee->delete()];
        return back();
    }
}
