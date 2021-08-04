@extends('admins.layouts.master')
@section('title','Option')
@section('content')
<div class="col-12">
    <div class="card">
        <h4 class="card-title m-3">Ingredients List</h4>
        <a href="{{url('admin/option/create')}}"> <button class="btn btn-success float-right">+Add</button></a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Main Ingredients</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stauts</th>
                            <th>Deleted Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($options as $option)
                        <tr>
                            <td>{{$loop->iteration + (10 * ($options->currentPage() - 1))}}</td>
                            <td>{{$option->mainOption->name}}</td>
                            <td>{{$option->name}}</td>
                            <td>{{$option->price}}</td>
                            <td>
                                @if($option->trashed())
                                <span class="badge badge-danger">InActive</span>
                                @else
                                <span class="badge badge-success">Active</span>
                                @endif
                            </td>
                            <td>
                                @if($option->trashed())
                                <span class="text-danger">{{$option->deleted_at}}</span>
                                @endif
                            </td>
                            <td>
                                @if($option->trashed())

                                <form action="{{url('admin/option/'.$option->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-warning" onclick="myRestoreFunction()">
                                        <i class="fa fa-recycle"></i>
                                    </button>

                                </form>
                                @else
                                <form action="{{url('admin/option/'.$option->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-sm mb-1" href="{{url('admin/option/'.$option->id.'/edit')}}">
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
        {{$options}}
    </div>
</div>
@endsection
