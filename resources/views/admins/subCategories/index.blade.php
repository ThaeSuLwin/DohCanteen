@extends('admins.layouts.master')
@section('title','SubCategory')
@section('content')
<div class="col-12">
    <div class="card">
        <h4 class="card-title m-3">Menu List</h4>
        <a href="{{url('admin/subCategory/create')}}"> <button class="btn btn-success float-right">+Add</button></a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                           <th>Canteen</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Ingredients</th>
                            <th>Additions</th>
                            <th>Stauts</th>
                            <th>Deleted Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subCategories as $subCategory)
                        <tr>
                            <td>{{$loop->iteration + (10 * ($subCategories->currentPage() - 1))}}</td>
                            <td>
                                <img src="{{asset('storage/subCategory_images/'.$subCategory->image)}}" alt="image"  style="width:100px; height:100px;">
                                </td>
                            <td>{{$subCategory->canteenInfo->name}}</td>
                            <td>{{$subCategory->category->name}}</td>
                            <td>{{$subCategory->name}}</td>
                            <td>{{$subCategory->price}}MMK</td>
                            <td>
                            <div class= "custom-text-box" style="width:160px; height:100px; overflow:auto;">
                        @foreach($subCategory->options as $option)

                               <li> {{ $option->name }}</li>

                        @endforeach
                        </div>
</td>
<td>
                        <div class= "custom-text-box" style="width:160px; height:100px; overflow:auto;">
                        @foreach($subCategory->additions as $addition)

                               <li> {{ $addition->name }}</li>

                        @endforeach
                        </div>

                            </td>
                            <td>
                                @if($subCategory->trashed())
                                <span class="badge badge-danger">InActive</span>
                                @else
                                <span class="badge badge-success">Active</span>
                                @endif
                            </td>
                            <td>
                                @if($subCategory->trashed())
                                <span class="text-danger">{{$subCategory->deleted_at}}</span>
                                @endif
                            </td>
                            <td>
                                @if($subCategory->trashed())

                                <form action="{{url('admin/subCategory/'.$subCategory->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-warning" onclick="myRestoreFunction()">
                                        <i class="fa fa-recycle"></i>
                                    </button>

                                </form>
                                @else
                                <form action="{{url('admin/subCategory/'.$subCategory->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-sm mb-1" href="{{url('admin/subCategory/'.$subCategory->id.'/edit')}}">
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
        {{$subCategories}}
    </div>
</div>
@endsection
