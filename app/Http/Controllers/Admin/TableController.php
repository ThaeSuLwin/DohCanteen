<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Table,TableType};
class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables=Table::withTrashed()->paginate(10);
        return view('admins.tables.index',compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tableTypes=TableType::all();
        return view('admins.tables.create-edit',compact('tableTypes'));
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
            'table_type_id'=>'required',
            'table_number'=> 'required',
        ]);
        $table=new Table;
        $table->table_type_id=$request->table_type_id;
        $table->table_number=$request->table_number;
        $table->save();
        return redirect('admin/table');
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
        $table=Table::findOrFail($id);
        $tableTypes=TableType::all();
        return view('admins.tables.create-edit',compact('table','tableTypes'));
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
            'table_type_id'=>'required',
            'table_number'=> 'required',
        ]);

        $table=Table::findOrFail($id);
        $table->table_type_id=$request->table_type_id;
        $table->table_number=$request->table_number;
        $table->update();
        return redirect('admin/table');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table=Table::withTrashed()->find($id);
        $table->trashed() ? [$table->restore()] : [$table->delete()];
        return back();
    }
}
