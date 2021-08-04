@extends('admins.layouts.master')
@section('title','Main Option')
@section('content')
<div class="col-12">
    <div class="card">
        <h4 class="card-title m-3">Main Option List</h4>
        <a href="{{url('admin/mainOption/create')}}"> <button class="btn btn-success float-right">+Add</button></a> 
        
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
                        @foreach($mainOptions as $mainOption)
                        <tr>
                            <td>{{$loop->iteration + (10 * ($mainOptions->currentPage() - 1))}}</td>
                            
                            <td>{{$mainOption->name}}</td>
                            
                            <td>
                                @if($mainOption->trashed())
                                <span class="badge badge-danger">UnActive</span>
                                @else
                                <span class="badge badge-success">Active</span>
                                @endif
                            </td>
                            <td>
                                @if($mainOption->trashed())
                                <span class="text-danger">{{$mainOption->deleted_at}}</span>
                                @endif
                            </td>
                            <td>
                                @if($mainOption->trashed())

                                <form action="{{url('admin/mainOption/'.$mainOption->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-warning" onclick="myRestoreFunction()">
                                        <i class="fa fa-recycle"></i>
                                    </button>

                                </form>
                                @else
                                <form action="{{url('admin/mainOption/'.$mainOption->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-sm mb-1" href="{{url('admin/mainOption/'.$mainOption->id.'/edit')}}">
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
        {{$mainOptions}}
    </div>
</div>
@endsection