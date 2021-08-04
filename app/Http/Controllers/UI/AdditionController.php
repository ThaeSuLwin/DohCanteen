<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Addition,MainAddition};
class AdditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $additions=Addition::withTrashed()->paginate(10);
        return view('users.additions.index',compact('additions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $additions=Addition::all();
        $mainAdditions=MainAddition::all();
        return view('users.additions.create-edit',compact('additions','mainAdditions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addition=new Addition;
        $addition->main_addition_id=$request->main_addition_id;
        $addition->name=$request->name;
        $addition->price=$request->price;
        $addition->save();
        return redirect('user/addition');
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
        $addition=Addition::findorFail($id);
     $mainAdditions=MainAddition::all();
 return view('users.additions.create-edit',compact('addition','mainAdditions'));
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
        $addition=Addition::findOrFail($id);
    $addition->main_addition_id=$request->main_addition_id;
    $addition->name=$request->name;
    $addition->price=$request->price;
    $addition->update();
    return redirect('user/addition');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $addition=Addition::withTrashed()->find($id);
    $addition->trashed() ? [$addition->restore()] : [$addition->delete()];
    return back();
    }
}
