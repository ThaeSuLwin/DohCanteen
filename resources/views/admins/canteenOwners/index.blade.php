@extends('admins.layouts.master')
@section('title','Canteen Owner')
@section('content')
<div class="col-12">
    <div class="card">
        <h4 class="card-title m-3">Canteen Owner List</h4>
        <a href="{{url('admin/canteenOwner/create')}}"> <button class="btn btn-success float-right">+Add</button></a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>License</th>
                            <th>Nationality Number</th>
                            <th>Phone Numbers</th>
                            <th>Address</th>
                            <th>Stauts</th>
                            <th>Deleted Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($canteenOwners as $canteenOwner)
                        <tr>
                            <td>{{$loop->iteration + (10 * ($canteenOwners->currentPage() - 1))}}</td>


                            <td>
                                <img src="{{asset('storage/canteen_owner_images/'.$canteenOwner->image)}}" alt="image"  style="width:100px; height:100px;">
                                </td>
                            <td>{{$canteenOwner->name}}</td>
                            <td>{{$canteenOwner->license}}</td>
                            <td>{{$canteenOwner->nationality_number}}</td>
                            <td>
                            {{$canteenOwner->phone_number_one}},
                            {{$canteenOwner->phone_number_two}}</td>
                            <td>{{$canteenOwner->address}}</td>
                            <td>
                                @if($canteenOwner->trashed())
                                <span class="badge badge-danger">InActive</span>
                                @else
                                <span class="badge badge-success">Active</span>
                                @endif
                            </td>
                            <td>
                                @if($canteenOwner->trashed())
                                <span class="text-danger">{{$canteenOwner->deleted_at}}</span>
                                @endif
                            </td>
                            <td>
                                @if($canteenOwner->trashed())

                                <form action="{{url('admin/canteenOwner/'.$canteenOwner->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-warning" onclick="myRestoreFunction()">
                                        <i class="fa fa-recycle"></i>
                                    </button>

                                </form>
                                @else
                                <form action="{{url('admin/canteenOwner/'.$canteenOwner->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-sm mb-1" href="{{url('admin/canteenOwner/'.$canteenOwner->id.'/edit')}}">
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
        {{$canteenOwners}}
    </div>
</div>
@endsection
