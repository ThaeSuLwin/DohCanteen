<?php

namespace App\Http\Controllers\UI;

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
    public function index()
    {
        $options=Option::withTrashed()->paginate(10);
        return view('users.options.index',compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mainOptions=Mainoption::all();
        return view('users.options.create-edit',compact('mainOptions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $option=new Option;
     $option->main_option_id=$request->main_option_id;
     $option->name=$request->name;
     $option->price=$request->price;
     $option->save();
     return redirect('user/option');
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
        $option=Option::findorFail($id);
        $mainOptions=Mainoption::all();
        return view('users.options.create-edit',compact('option','mainOptions'));
 
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
        $option=Option::findOrFail($id);
        $option->main_option_id=$request->main_option_id;
        $option->name=$request->name;
        $option->price=$request->price;
        $option->update();
        return redirect('user/option');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $option=Option::withTrashed()->find($id);
        $option->trashed() ? [$option->restore()] : [$option->delete()];
        return back();
    }
}
