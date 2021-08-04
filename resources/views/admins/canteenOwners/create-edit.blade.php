@extends('admins.layouts.master')
@section('title','Canteen Owner')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-title m-3">Canteen Owner Form</h4>
                    <form action="{{isset($canteenOwner) ? url('admin/canteenOwner/'.$canteenOwner->id) : url('admin/canteenOwner') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($canteenOwner))
                        @method('PUT')
                        @endif
                        <div class="card-body">
                        
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" placeholder="Please Enter Your Name" class="form-control @error('name') is-invalid @enderror" value="{{old() ? old('name') : (isset($canteenOwner->name) ? $canteenOwner->name : '' )}}" required>
                                
                                <span class="invalid-feedback">
                                    
                                    {{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                            
                            <div class="form-group">
                                <label for="license">License</label>
                                <input type="text" name="license" id="license" placeholder="Please Enter Your Restaurant License"class="form-control @error('license') is-invalid @enderror" value="{{old() ? old('license') : (isset($canteenOwner->license) ? $canteenOwner->license : '' )}}" required>
                                
                                <span class="invalid-feedback">
                                    
                                    {{ $errors->has('license') ? $errors->first('license') : '' }}</span>
                            </div>
                            <div class="form-group">
                                <label for="nationality_number">Nationality Number</label>
                                <input type="text" name="nationality_number" id="nationality_number" placeholder="Please Enter Your NRC Number" class="form-control @error('nationality_number') is-invalid @enderror" value="{{old() ? old('nationality_number') : (isset($canteenOwner->nationality_number) ? $canteenOwner->nationality_number : '' )}}" required>
                                
                                <span class="invalid-feedback">
                                    
                                    {{ $errors->has('nationality_number') ? $errors->first('nationality_number') : '' }}</span>
                            </div>
                            <div class="form-group">
                                <label for="phone_number_one">Phone Number 1</label>
                                <input type="text" name="phone_number_one" id="phone_number_one" placeholder="Please Enter Your Phone Number" class="form-control @error('phone_number_one') is-invalid @enderror" value="{{old() ? old('phone_number_one') : (isset($canteenOwner->phone_number_one) ? $canteenOwner->phone_number_one : '' )}}" required>
                                
                                <span class="invalid-feedback">
                                    
                                    {{ $errors->has('phone_number_one') ? $errors->first('phone_number_one') : '' }}</span>
                            </div>
                            <div class="form-group">
                                <label for="phone_number_two">Phone Number 2</label>
                                <input type="text" name="phone_number_two" id="phone_number_two"  placeholder="Please Enter Your Phone Number" class="form-control @error('phone_number_two') is-invalid @enderror" value="{{old() ? old('phone_number_two') : (isset($canteenOwner->phone_number_two) ? $canteenOwner->phone_number_two : '' )}}" required>
                                
                                <span class="invalid-feedback">
                                    
                                    {{ $errors->has('phone_number_two') ? $errors->first('phone_number_two') : '' }}</span>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" placeholder="Please Enter Your Full Address"class="form-control @error('address') is-invalid @enderror" value="{{old() ? old('address') : (isset($canteenOwner->address) ? $canteenOwner->address : '' )}}" required>
                                
                                <span class="invalid-feedback">
                                    
                                    {{ $errors->has('address') ? $errors->first('address') : '' }}</span>
                            </div>
                            <div class="form-group">
                                <label for="image">Canteen Owner Image</label>
                                <input type="file" name="image" class="form-control" required>

                            </div>
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-dot-circle-o"></i>Submit
                            </button>
                            <button class="btn btn-danger" type="reset">
                                <i class="fa fa-ban"></i>    
                                Reset</button>
                                <a href="{{url('admin/canteenOwner')}}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
        @endsection
        
        