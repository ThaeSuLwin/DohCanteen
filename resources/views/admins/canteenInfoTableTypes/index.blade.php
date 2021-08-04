@extends('admins.layouts.master')
@section('title','canteenInfoTableType')
@section('content')
<div class="col-12">
    <div class="card">
        <h4 class="card-title m-3">subCategoryAddition List</h4>
        <a href="{{url('admin/canteenInfoTableType/create')}}"> <button class="btn btn-success float-right">+Add</button></a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>CanteenInfo</th>
                            <th>Table Type</th>
                            <th>Stauts</th>
                            <th>Deleted Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($canteenInfoTableTypes as $canteenInfoTableType)
                        <tr>
                            <td>{{$loop->iteration + (10 * ($canteenInfoTableTypes->currentPage() - 1))}}</td>
                            <td>{{$canteenInfoTableType->canteenInfo->name}}</td>
                            <td>{{$canteenInfoTableType->tableType->name}}</td>
                            <td>
                                @if($canteenInfoTableType->trashed())
                                <span class="badge badge-danger">InActive</span>
                                @else
                                <span class="badge badge-success">Active</span>
                                @endif
                            </td>
                            <td>
                                @if($canteenInfoTableType->trashed())
                                <span class="text-danger">{{$canteenInfoTableType->deleted_at}}</span>
                                @endif
                            </td>
                            <td>
                                @if($canteenInfoTableType->trashed())

                                <form action="{{url('admin/canteenInfoTableType/'.$canteenInfoTableType->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-warning" onclick="myRestoreFunction()">
                                        <i class="fa fa-recycle"></i>
                                    </button>

                                </form>
                                @else
                                <form action="{{url('admin/canteenInfoTableType/'.$canteenInfoTableType->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-sm mb-1" href="{{url('admin/canteenInfoTableType/'.$canteenInfoTableType->id.'/edit')}}">
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
        {{$canteenInfoTableTypes}}
    </div>
</div>
@endsection
