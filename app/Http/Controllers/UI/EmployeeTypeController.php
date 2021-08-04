<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{EmployeeType,Employee,CanteenInfoEmployeeType};
class EmployeeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeTypes=EmployeeType::withTrashed()->paginate(10);
        return view('users.employeeTypes.index',compact('employeeTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.employeeTypes.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employeeType=new EmployeeType;
        $employeeType->name=$request->name;
        $employeeType->save();
        return redirect('user/employeeType');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees=Employee::where('canteen_info_id',$canteenId)
                            ->where('employee_type_id',$id)
                            ->get();
                          
        return view('users.employeeTypes.show',compact('employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeeType=EmployeeType::findOrFail($id);
        return view('users.employeeTypes.create-edit',compact('employeeType'));
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
        $employeeType=EmployeeType::findOrFail($id);
        $employeeType->name=$request->name;
        $employeeType->update();
        return redirect('user/employeeType');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employeeType=EmployeeType::withTrashed()->find($id);
        $employeeType->trashed() ? [$employeeType->restore()] : [$employeeType->delete()];
        return back();
    }
}
