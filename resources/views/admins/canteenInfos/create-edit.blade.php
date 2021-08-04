@extends('admins.layouts.master')
@section('title','CanteenInfo')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-title m-3">CanteenInfo Form</h4>
                    <form action="{{isset($canteenInfo) ? url('admin/canteenInfo/'.$canteenInfo->id) : url('admin/canteenInfo') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($canteenInfo))
                        @method('PUT')
                        @endif
                        <div class="card-body">
                        <div class="form_group">
                    <label for="">Canteen Owner</label>
                    <select name="canteen_owner_id" id="" class="form-control">
                        <option value="">Select </option>
                        @foreach($canteenOwners as $canteenOwner)
                        <option value="{{$canteenOwner->id}}">{{$canteenOwner->name}}</option>
                        @endforeach
                    </select>
                </div>
</br>
                <div class="form_group">
                <label for =""> Canteen Tables :</label></br>
                    @foreach($tableTypes as $tableType)
                  
                   <input type="checkbox" class="checkbox-inline" name="tableType[]" value="{{$tableType->id}}"> <label for="">{{$tableType->name}}</label>
                   @endforeach
                </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old() ? old('name') : (isset($canteenInfo->name) ? $canteenInfo->name : '' )}}" required>
                                
                                <span class="invalid-feedback">
                                    
                                    {{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                           
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{old() ? old('address') : (isset($canteenInfo->address) ? $canteenInfo->address : '' )}}" required>
                                
                                <span class="invalid-feedback">
                                    
                                    {{ $errors->has('address') ? $errors->first('address') : '' }}</span>
                            </div>
                          
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{old() ? old('phone_number') : (isset($canteenInfo->phone_number) ? $canteenInfo->phone_number : '' )}}" required>
                                
                                <span class="invalid-feedback">
                                    
                                    {{ $errors->has('phone_number') ? $errors->first('phone_number') : '' }}</span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old() ? old('email') : (isset($canteenInfo->email) ? $canteenInfo->email : '' )}}" required>
                                
                                <span class="invalid-feedback">
                                    
                                    {{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                            </div>
                <div class="form-group">
                <label for=""> Description </label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{old() ? old('description') : (isset($canteenInfo->description) ? $canteenInfo->description : '' )}}</textarea>
            </div>

            <div class="form_group">
                   <label for=""> Employee :</label> </br>
                    @foreach($employeeTypes as $employeeType)
                   
                   <input type="checkbox" class="checkbox-inline" name="employeeType[]" value="{{$employeeType->id}}"> <label for="">{{$employeeType->name}}</label>
                   @endforeach
                </div>
                            <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                            <span class="invalid-feedback">
                                {{$errors->has('image') ? $errors->first('image') : ''}}</span>
                            </div>
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-dot-circle-o"></i>Submit
                            </button>
                            <button class="btn btn-danger" type="reset">
                                <i class="fa fa-ban"></i>    
                                Reset</button>
                                <a href="{{url('admin/canteenInfo')}}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
        @endsection
        
        