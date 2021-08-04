@extends('admins.layouts.master')
@section('title','Employee')
@section('content')
<div class="col-12">
    <div class="card">
        <h4 class="card-title m-3">Employee List</h4>
        <a href="{{url('admin/employee/create')}}"> <button class="btn btn-success float-right">+Add</button></a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Canteen</th>
                            <th>Employee Type</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Nationality Number</th>
                            <th>Gender</th>
                            <th>Location</th>
                            <th>Salary</th>
                            <th>About You</th>
                            <th>Stauts</th>
                            <th>Deleted Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                        <tr>
                            <td>{{$loop->iteration + (10 * ($employees->currentPage() - 1))}}</td>
                            <td>
                                <img src="{{asset('storage/employee_images/'.$employee->image)}}" alt="image"  style="width:100px; height:100px;">
                                </td>
                            <td>{{$employee->canteenInfo->name}}</td>
                            <td>{{$employee->employeeType->name}}</td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->phone_number}}</td>
                            <td>{{$employee->nationality_number}}</td>
                            <td>
                            {{$employee->gender->name}}
                            </td>
                            <td>{{$employee->address}}</td>
                            <td>{{$employee->salary}}</td>
                            <td>
                            <div class= "custom-text-box" style="width:300px; height:100px; overflow:auto;">
                                <p class="m-2">{{ $employee->about_you }}</p>
                                </div>
                                </td>
                            <td>
                                @if($employee->trashed())
                                <span class="badge badge-danger">InActive</span>
                                @else
                                <span class="badge badge-success">Active</span>
                                @endif
                            </td>
                            <td>
                                @if($employee->trashed())
                                <span class="text-danger">{{$employee->deleted_at}}</span>
                                @endif
                            </td>
                            <td>
                                @if($employee->trashed())

                                <form action="{{url('admin/employee/'.$employee->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-warning" onclick="myRestoreFunction()">
                                        <i class="fa fa-recycle"></i>
                                    </button>

                                </form>
                                @else
                                <form action="{{url('admin/employee/'.$employee->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-sm mb-1" href="{{url('admin/employee/'.$employee->id.'/edit')}}">
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
        {{$employees}}
    </div>
</div>
@endsection
