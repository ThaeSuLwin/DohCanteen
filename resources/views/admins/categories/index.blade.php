@extends('admins.layouts.master')
@section('title','Category')
@section('content')
<div class="col-12">
    <div class="card">
        <h4 class="card-title m-3">Category List</h4>
        <a href="{{url('admin/category/create')}}"> <button class="btn btn-success float-right">+Add</button></a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Canteen</th>
                            <th>Name</th>
                            <th>Stauts</th>
                            <th>Deleted Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$loop->iteration + (10 * ($categories->currentPage() - 1))}}</td>
                            <td>{{$category->canteenInfo->name}}</td>
                            <td>{{$category->name}}</td>

                            <td>
                                @if($category->trashed())
                                <span class="badge badge-danger">InActive</span>
                                @else
                                <span class="badge badge-success">Active</span>
                                @endif
                            </td>
                            <td>
                                @if($category->trashed())
                                <span class="text-danger">{{$category->deleted_at}}</span>
                                @endif
                            </td>
                            <td>
                                @if($category->trashed())

                                <form action="{{url('admin/category/'.$category->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-warning" onclick="myRestoreFunction()">
                                        <i class="fa fa-recycle"></i>
                                    </button>

                                </form>
                                @else
                                <form action="{{url('admin/category/'.$category->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-sm mb-1" href="{{url('admin/category/'.$category->id.'/edit')}}">
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
        {{$categories}}
    </div>
</div>
@endsection
