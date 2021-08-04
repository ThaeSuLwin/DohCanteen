<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MainOption;
class MainOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainOptions=MainOption::withTrashed()->paginate(10);
        return view ('admins.mainOptions.index',compact('mainOptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.mainOptions.create-edit');
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
             'name'=> 'required',
         ]);
         $mainOption=new MainOption;
         $mainOption->name=$request->name;
         $mainOption->save();
         return redirect('admin/mainOption');
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
        $mainOption=MainOption::findOrFail($id);
        return view('admins.mainOptions.create-edit',compact('mainOption'));
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
            'name'=>'required',
        ]);
        $mainOption=MainOption::findOrFail($id);
        $mainOption->name=$request->name;
        $mainOption->update();
        return redirect('admin/mainOption');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mainOption=MainOption::withTrashed()->find($id);
        $mainOption->trashed() ? [$mainOption->restore()] : [$mainOption->delete()];
        return back();
    }
}
