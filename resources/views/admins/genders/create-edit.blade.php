@extends('admins.layouts.master')
@section('title','Gender')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-title m-3">Gender Form</h4>
                    <form action="{{isset($gender) ? url('admin/gender/'.$gender->id) : url('admin/gender') }}" method="POST">
                        @csrf
                        @if(isset($gender))
                        @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old() ? old('name') : (isset($gender->name) ? $gender->name : '' )}}" required>
                                
                                <span class="invalid-feedback">
                                    
                                    {{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                       
                            
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-dot-circle-o"></i>Submit
                            </button>
                            <button class="btn btn-danger" type="reset">
                                <i class="fa fa-ban"></i>    
                                Reset</button>
                                <a href="{{url('admin/gender')}}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
        @endsection
        
        