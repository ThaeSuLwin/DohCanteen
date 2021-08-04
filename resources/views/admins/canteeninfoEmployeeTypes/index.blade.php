@extends('admins.layouts.master')
@section('title','canteenInfoEmployeeType')
@section('content')
<div class="col-12">
    <div class="card">
        <h4 class="card-title m-3">canteenInfoEmployeeType List</h4>
        <a href="{{url('admin/canteenInfoEmployeeType/create')}}"> <button class="btn btn-success float-right">+Add</button></a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>CanteenInfo</th>
                            <th>Employee Type</th>
                            <th>Stauts</th>
                            <th>Deleted Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($canteenInfoEmployeeTypes as $canteenInfoEmployeeType)
                        <tr>
                            <td>{{$loop->iteration + (10 * ($canteenInfoEmployeeTypes->currentPage() - 1))}}</td>
                            <td>{{$canteenInfoEmployeeType->canteenInfo->name}}</td>
                            <td>{{$canteenInfoEmployeeType->tableType->name}}</td>
                            <td>
                                @if($canteenInfoEmployeeType->trashed())
                                <span class="badge badge-danger">InActive</span>
                                @else
                                <span class="badge badge-success">Active</span>
                                @endif
                            </td>
                            <td>
                                @if($canteenInfoEmployeeType->trashed())
                                <span class="text-danger">{{$canteenInfoEmployeeType->deleted_at}}</span>
                                @endif
                            </td>
                            <td>
                                @if($canteenInfoEmployeeType->trashed())

                                <form action="{{url('admin/canteenInfoEmployeeType/'.$canteenInfoEmployeeType->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-warning" onclick="myRestoreFunction()">
                                        <i class="fa fa-recycle"></i>
                                    </button>

                                </form>
                                @else
                                <form action="{{url('admin/canteenInfoEmployeeType/'.$canteenInfoEmployeeType->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-sm mb-1" href="{{url('admin/canteenInfoEmployeeType/'.$canteenInfoEmployeeType->id.'/edit')}}">
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
        {{$canteenInfoEmployeeTypes}}
    </div>
</div>
@endsection
