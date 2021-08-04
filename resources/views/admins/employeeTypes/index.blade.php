@extends('admins.layouts.master')
@section('title','employeeType')
@section('content')
<div class="col-12">
    <div class="card">
        <h4 class="card-title m-3">EmployeeType List</h4>
        <a href="{{url('admin/employeeType/create')}}"> <button class="btn btn-success float-right">+Add</button></a> 
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                           
                            <th>Name</th>
                            
                            <th>Stauts</th>
                            <th>Deleted Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employeeTypes as $employeeType)
                        <tr>
                            <td>{{$loop->iteration + (10 * ($employeeTypes->currentPage() - 1))}}</td>
                            
                            <td>{{$employeeType->name}}</td>
                            
                            <td>
                                @if($employeeType->trashed())
                                <span class="badge badge-danger">UnActive</span>
                                @else
                                <span class="badge badge-success">Active</span>
                                @endif
                            </td>
                            <td>
                                @if($employeeType->trashed())
                                <span class="text-danger">{{$employeeType->deleted_at}}</span>
                                @endif
                            </td>
                            <td>
                                @if($employeeType->trashed())

                                <form action="{{url('admin/employeeType/'.$employeeType->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-warning" onclick="myRestoreFunction()">
                                        <i class="fa fa-recycle"></i>
                                    </button>

                                </form>
                                @else
                                <form action="{{url('admin/employeeType/'.$employeeType->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-sm mb-1" href="{{url('admin/employeeType/'.$employeeType->id.'/edit')}}">
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
        {{$employeeTypes}}
    </div>
</div>
@endsection