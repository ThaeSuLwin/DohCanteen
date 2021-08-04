@extends('admins.layouts.master')
@section('title','subCategoryAddition')
@section('content')
<div class="col-12">
    <div class="card">
        <h4 class="card-title m-3">subCategoryAddition List</h4>
        <a href="{{url('admin/subCategoryAddition/create')}}"> <button class="btn btn-success float-right">+Add</button></a> 
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>SubCategory</th>
                            <th>Addition</th>
                            <th>Stauts</th>
                            <th>Deleted Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subCategoryAdditions as $subCategoryAddition)
                        <tr>
                            <td>{{$loop->iteration + (10 * ($subCategoryAdditions->currentPage() - 1))}}</td>
                            <td>{{$subCategoryAddition->subCategory->name}}</td>
                            <td>{{$subCategoryAddition->Addition->name}}</td>
                            <td>
                                @if($subCategoryAddition->trashed())
                                <span class="badge badge-danger">UnActive</span>
                                @else
                                <span class="badge badge-success">Active</span>
                                @endif
                            </td>
                            <td>
                                @if($subCategoryAddition->trashed())
                                <span class="text-danger">{{$subCategoryAddition->deleted_at}}</span>
                                @endif
                            </td>
                            <td>
                                @if($subCategoryAddition->trashed())

                                <form action="{{url('admin/subCategoryAddition/'.$subCategoryAddition->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-warning" onclick="myRestoreFunction()">
                                        <i class="fa fa-recycle"></i>
                                    </button>

                                </form>
                                @else
                                <form action="{{url('admin/subCategoryAddition/'.$subCategoryAddition->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-sm mb-1" href="{{url('admin/subCategoryAddition/'.$subCategoryAddition->id.'/edit')}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm mb-1" onclick="myFunction()">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{$subCategoryAdditions}}
    </div>
</div>
@endsection