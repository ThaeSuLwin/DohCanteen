<?php

namespace App\Http\Controllers\Admin;

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
    public function index(){

        $additions=Addition::withTrashed()->paginate(10);
        return view('admins.additions.index',compact('additions'));
    }

    public function create(){
        $additions=Addition::all();
        $mainAdditions=MainAddition::all();
        return view('admins.additions.create-edit',compact('additions','mainAdditions'));
    }

    public function store(Request $request){

        $addition=new Addition;
        $addition->main_addition_id=$request->main_addition_id;
        $addition->name=$request->name;
        $addition->price=$request->price;
        $addition->save();
        return redirect('admin/addition');
    }


    public function edit($id)
    {
        $addition=Addition::findorFail($id);
        $mainAdditions=MainAddition::all();
        return view('admins.additions.create-edit',compact('addition','mainAdditions'));
    }




    public function update(Request $request,$id){

        $addition=Addition::findOrFail($id);
        $addition->main_addition_id=$request->main_addition_id;
        $addition->name=$request->name;
        $addition->price=$request->price;
        $addition->update();
        return redirect('admin/addition');

    }


    public function destroy($id)
    {
        $addition=Addition::withTrashed()->find($id);
        $addition->trashed() ? [$addition->restore()] : [$addition->delete()];
        return back();

    }

}
