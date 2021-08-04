<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MainAddition;
class MainAdditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainAdditions=MainAddition::withTrashed()->paginate(10);
        return view ('users.mainAdditions.index',compact('mainAdditions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.mainAdditions.create-edit');
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
        $mainAddition=new MainAddition;
        $mainAddition->name=$request->name;
        $mainAddition->save();
        return redirect('user/mainAddition');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $additions =Addition::where('main_addition_id',$id)->paginate(5);
        return view('users.mainAdditions.show',compact('additions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mainAddition=MainAddition::findOrFail($id);
        return view('users.mainAdditions.create-edit',compact('mainAddition'));
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
        $mainAddition=MainAddition::findOrFail($id);
        $mainAddition->name=$request->name;
        $mainAddition->update();
        return redirect('user/mainAddition');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mainAddition=MainAddition::withTrashed()->find($id);
        $mainAddition->trashed() ? [$mainAddition->restore()] : [$mainAddition->delete()];
        return back();
    }
}
