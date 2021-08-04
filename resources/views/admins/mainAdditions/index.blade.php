@extends('admins.layouts.master')
@section('title','Main Addition')
@section('content')
<div class="col-12">
    <div class="card">
        <h4 class="card-title m-3">Main Addition List</h4>
        <a href="{{url('admin/mainAddition/create')}}"> <button class="btn btn-success float-right">+Add</button></a> 
        
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
                        @foreach($mainAdditions as $mainAddition)
                        <tr>
                            <td>{{$loop->iteration + (10 * ($mainAdditions->currentPage() - 1))}}</td>
                            
                            <td>{{$mainAddition->name}}</td>
                            
                            <td>
                                @if($mainAddition->trashed())
                                <span class="badge badge-danger">UnActive</span>
                                @else
                                <span class="badge badge-success">Active</span>
                                @endif
                            </td>
                            <td>
                                @if($mainAddition->trashed())
                                <span class="text-danger">{{$mainAddition->deleted_at}}</span>
                                @endif
                            </td>
                            <td>
                                @if($mainAddition->trashed())

                                <form action="{{url('admin/mainAddition/'.$mainAddition->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-warning" onclick="myRestoreFunction()">
                                        <i class="fa fa-recycle"></i>
                                    </button>

                                </form>
                                @else
                                <form action="{{url('admin/mainAddition/'.$mainAddition->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-sm mb-1" href="{{url('admin/mainAddition/'.$mainAddition->id.'/edit')}}">
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
        {{$mainAdditions}}
    </div>
</div>
@endsection