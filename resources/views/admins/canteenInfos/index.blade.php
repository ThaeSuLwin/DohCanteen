@extends('admins.layouts.master')
@section('title','CanteenInfo')
@section('content')
<div class="col-12">
    <div class="card">
        <h4 class="card-title m-3">CanteenInfo List</h4>
        <a href="{{url('admin/canteenInfo/create')}}"> <button class="btn btn-success float-right">+Add</button></a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Canteen Owner</th>
                            <th>Canteen Tables</th>
                            <th>Employee</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Description</th>
                            <th>Stauts</th>
                            <th>Deleted Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($canteenInfos as $canteenInfo)

                        <tr>
                            <td>{{$loop->iteration + (10 * ($canteenInfos->currentPage() - 1))}}</td>
                            <td>
                                <img src="{{asset('storage/canteen_info_images/'.$canteenInfo->image)}}" alt="image"  style="width:100px; height:100px;">
                                </td>
                                <td>{{$canteenInfo->name}}</td>
                            <td>{{$canteenInfo->canteenOwner->name}}</td>
                            {{--<td>
                @foreach($canteenInfo->employeeTypes as $employeeType)
                <span class="badge badge-primary"> {{$employeeType->name}}</span>
                @endforeach
                            </td>--}}
                            <td>
                @foreach($canteenInfo->tableTypes as $tableType)
                <span class="badge badge-success">{{$tableType->name}}</span>
                @endforeach
                            </td>
                            <td>
                            @foreach($canteenInfo->employeeTypes as $employeeType)
                            <a class="btn btn-outline-primary btn-sm mb-1" href="{{url('admin/'.$canteenInfo->id.'/employeeType/show/'.$employeeType->id)}}" role="button"> {{$employeeType->name}}</a>
                           @endforeach
                            </td>

                            <td>{{$canteenInfo->address}}</td>
                            <td>{{$canteenInfo->phone_number}}</td>
                            <td>{{$canteenInfo->email}}</td>
                            <td>
                            <div class= "custom-text-box" style="width:300px; height:100px; overflow:auto;">
                                <p class="m-2">{{ $canteenInfo->description }}</p>
                                </div>
                            </td>

                            <td>
                                @if($canteenInfo->trashed())
                                <span class="badge badge-danger">InActive</span>
                                @else
                                <span class="badge badge-success">Active</span>
                                @endif
                            </td>
                            <td>
                                @if($canteenInfo->trashed())
                                <span class="text-danger">{{$canteenInfo->deleted_at}}</span>
                                @endif
                            </td>
                            <td>
                                @if($canteenInfo->trashed())

                                <form action="{{url('admin/canteenInfo/'.$canteenInfo->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-warning" onclick="myRestoreFunction()">
                                        <i class="fa fa-recycle"></i>
                                    </button>

                                </form>
                                @else
                                <form action="{{url('admin/canteenInfo/'.$canteenInfo->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-sm mb-1" href="{{url('admin/canteenInfo/'.$canteenInfo->id.'/edit')}}">
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
        {{$canteenInfos}}
    </div>
</div>
@endsection
