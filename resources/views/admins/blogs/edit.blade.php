@extends('admins.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    
                    <h4 class="card-title m-3">Blog Form</h4>
                        @if(Session("success"))
                          <div class="alert alert-success">
                        {{Session("success")}}
                        <button class="close" data-dismiss="alert">&times;</button> 
                         </div>
                          @endif
                    <form action="{{url ("admin/blog/update",$edit_blog_data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label><br>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{$edit_blog_data->title}}">
                                @error("title")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                                
                            </div>
                            <div class="form-group">
                                <label for="organization_name">Organization_name</label><br>
                                <input type="text" name="organization_name" id="organization_name" class="form-control @error('organization_name') is-invalid @enderror" value="{{$edit_blog_data->organization_name}}">
                                @error("organization_name")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                                
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label><br>
                                <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{$edit_blog_data->description}}">
                                @error("description")
                                <p class="text-danger">{{$message}}</p>
                                @enderror 
                            </div>
                            <div class="form-group">
                                <label for="date">date</label><br>
                                <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{$edit_blog_data->date }}">
                                @error("date")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                                <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                <label for="start_time">Start Time</label><br>
                                <input type="time" name="start_time" id="time" class="form-control @error('start_time') is-invalid @enderror" value="{{$edit_blog_data->start_time }}">
                                @error("start_time")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="end_time">end Time</label><br>
                                <input type="time" name="end_time" id="time" class="form-control @error('end_time') is-invalid @enderror" value="{{$edit_blog_data->end_time }}">
                                @error("end_time")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            </div>
                            </div>
                              <div class="form-group">
                                <label for="date">Image</label><br>
                                <input type="file" name="image" id="image" class="form-control @error('date') is-invalid @enderror" required >
                                @error("image")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-dot-circle-o"></i>Submit
                            </button>
                            {{-- <button class="btn btn-danger" type="reset">
                                <i class="fa fa-ban"></i>    
                                Reset</button>
                                <a href="{{url('admin/blog')}}" class="btn btn-secondary">Cancel</a> --}}
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection