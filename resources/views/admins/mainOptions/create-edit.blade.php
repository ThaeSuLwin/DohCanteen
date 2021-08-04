@extends('admins.layouts.master')
@section('title','Main Option')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-title m-3">Main Option Form</h4>
                    <form action="{{isset($mainOption) ? url('admin/mainOption/'.$mainOption->id) : url('admin/mainOption') }}" method="POST">
                        @csrf
                        @if(isset($mainOption))
                        @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old() ? old('name') : (isset($mainOption->name) ? $mainOption->name : '' )}}" required>
                                
                                <span class="invalid-feedback">
                                    
                                    {{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-dot-circle-o"></i>Submit
                            </button>
                            <button class="btn btn-danger" type="reset">
                                <i class="fa fa-ban"></i>    
                                Reset</button>
                                <a href="{{url('admin/mainOption')}}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
        @endsection
        
        