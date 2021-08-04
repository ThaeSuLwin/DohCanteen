@extends('admins.layouts.master')
{{-- @section('title','Category') --}}
@section('content')
<div class="col-12">
    <div class="card">
        <h4 class="card-title m-3">Blog List</h4>
        <a href="{{url('admin/blog/create')}}"> <button class="btn btn-success float-right">+Add</button></a> 
        @if(Session("delete"))
        <div class="alert alert-danger">{{Session("delete")}}
        <button class="close" data-dismiss="alert">&times;</button> 
        </div>
        @endif
        
        <div class="card-body">
            <div class="table-responsive">
                
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Organization Name</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Start Time</th>
                             <th>End Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($blogs as $blog)
                     
                        <tr>
                            {{-- <td>{{$loop->iteration + (10 * ($blogs ?? ''->currentPage() - 1))}}</td>
                            <td>{{$blog->title}}</td>
                            <td>{{$blog->organization_name}}</td>
                            <td>{{$blog->description}}</td>
                            <td>{{$blog->date}}</td>  --}}

                             
                             <td>{{$loop->iteration + (5 * ($blogs->currentPage() - 1))}}</td>
                             <td>
                                <img src="{{asset('storage/blog_images/'.$blog->image)}}" alt="image"  style="width:100px; height:100px;">
                                </td>
                            <td>{{$blog['title']}}</td>
                            <td>{{$blog['organization_name']}}</td>
                            <td>{{$blog['description']}}</td>
                            <td>{{$blog['date']}}</td> 
                            <td>{{$blog['start_time']}}</td> 
                            <td>{{$blog['end_time']}}</td> 
                            <td>
                                <a href="{{ route ("edit",$blog->id)}}" class="btn btn-success btn-sm">
                                      
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-sm" href="{{ url ("/admin/blog/$blog->id")}}" method="POST">
                                <i class="fa fa-trash"></i></a>
                            </td>


                        
                            {{-- <td>
                                @if($category->trashed())
                                <span class="text-danger">{{$category->deleted_at}}</span>
                                @endif
                            </td> --}}
                            {{-- <td>
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
                            </td> --}}
                        </tr> 
                        @endforeach 
                       
                    </tbody>
                </table>
                 {{$blogs}}
            </div>
        </div>
       
    </div>
</div>
@endsection