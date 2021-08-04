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
                    <form action="{{url ('/admin/blog')}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label><br>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" required>
                                @error("title")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                                
                            </div>
                            <div class="form-group">
                                <label for="organization_name">Organization_name</label><br>
                                <input type="text" name="organization_name" id="organization_name" class="form-control @error('organization_name') is-invalid @enderror" required >
                                @error("organization_name")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                                
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label><br>
                               <textarea name="description" id="" cols="10" rows="5" class="form-control" required></textarea>
                                @error("description")
                                <p class="text-danger">{{$message}}</p>
                                @enderror 
                            </div>
                            <div class="form-group">
                                <label for="date">date</label><br>
                                <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" required >
                                @error("date")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="start_time">Start Time</label>
                                        <input type="time" name="start_time" class="form-control" id="" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="end_time">End Time</label>
                                        <input type="time" name="end_time" class="form-control" id="" required>
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
                            <button class="btn btn-danger" type="reset">
                                <i class="fa fa-ban"></i>    
                                Reset</button>
                                <a href="{{url('admin/blog')}}" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection