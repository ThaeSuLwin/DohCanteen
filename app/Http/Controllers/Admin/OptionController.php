<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Option,MainOption};
class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $options=Option::withTrashed()->paginate(10);
        return view('admins.options.index',compact('options'));
    }



    public function create()
    {
        $mainOptions=Mainoption::all();
        return view('admins.options.create-edit',compact('mainOptions'));
    }



    public function store(Request $request)
{

     $option=new Option;
     $option->main_option_id=$request->main_option_id;
     $option->name=$request->name;
     $option->price=$request->price;
     $option->save();
     return redirect('admin/option');
 }

    public function edit($id)
    {
        $option=Option::findorFail($id);
        $mainOptions=Mainoption::all();
        return view('admins.options.create-edit',compact('option','mainOptions'));
    }



    public function update(Request $request, $id)
    {
        $option=Option::findOrFail($id);
        $option->main_option_id=$request->main_option_id;
        $option->name=$request->name;
        $option->price=$request->price;
        $option->update();
        return redirect('admin/option');
    }


    public function destroy($id)
    {
        $option=Option::withTrashed()->find($id);
        $option->trashed() ? [$option->restore()] : [$option->delete()];
        return back();
    }

}
