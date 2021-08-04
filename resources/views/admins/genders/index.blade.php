@extends('admins.layouts.master')
@section('title','gender')
@section('content')
<div class="col-12">
    <div class="card">
        <h4 class="card-title m-3">gender List</h4>
        <a href="{{url('admin/gender/create')}}"> <button class="btn btn-success float-right">+Add</button></a> 
        
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
                        @foreach($genders as $gender)
                        <tr>
                            <td>{{$loop->iteration + (10 * ($genders->currentPage() - 1))}}</td>
                            
                            <td>{{$gender->name}}</td>
                           
                            <td>
                                @if($gender->trashed())
                                <span class="badge badge-danger">UnActive</span>
                                @else
                                <span class="badge badge-success">Active</span>
                                @endif
                            </td>
                            <td>
                                @if($gender->trashed())
                                <span class="text-danger">{{$gender->deleted_at}}</span>
                                @endif
                            </td>
                            <td>
                                @if($gender->trashed())

                                <form action="{{url('admin/gender/'.$gender->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-warning" onclick="myRestoreFunction()">
                                        <i class="fa fa-recycle"></i>
                                    </button>

                                </form>
                                @else
                                <form action="{{url('admin/gender/'.$gender->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-sm mb-1" href="{{url('admin/gender/'.$gender->id.'/edit')}}">
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
        {{$genders}}
    </div>
</div>
@endsection