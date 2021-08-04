@extends('admins.layouts.master')
@section('title','employee')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-title m-3">Employee Form</h4>
                    <form action="{{isset($employee) ? url('admin/employee/'.$employee->id) : url('admin/employee') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($employee))
                        @method('PUT')
                        @endif
                        <div class="card-body">
                        <div class="form-group">
                    <label for=""> Canteen</label>
                    <select name="canteen_info_id" id=""   class="form-control">
                        <option value="">Select </option>
                        @foreach($canteenInfos as $canteenInfo)
                        <option value="{{$canteenInfo->id}}">{{$canteenInfo->name}}</option>
                        @endforeach
                    </select>
                </div>
                        <div class="form-group">
                    <label for="">Employee Type</label>
                    <select name="employee_type_id" id=""   class="form-control">
                        <option value="">Select </option>
                        @foreach($employeeTypes as $employeeType)
                        <option value="{{$employeeType->id}}">{{$employeeType->name}}</option>
                        @endforeach
                    </select>
                </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old() ? old('name') : (isset($employee->name) ? $employee->name : '' )}}" required>
                                
                                <span class="invalid-feedback">
                                    
                                    {{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old() ? old('email') : (isset($employee->email) ? $employee->email : '' )}}" required>
                                
                                <span class="invalid-feedback">
                                    
                                    {{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{old() ? old('phone_number') : (isset($employee->phone_number) ? $employee->phone_number : '' )}}" required>
                                
                                <span class="invalid-feedback">
                                    
                                    {{ $errors->has('phone_number') ? $errors->first('phone_number') : '' }}</span>
                            </div>
                            <div class="form-group">
                                <label for="nationality_number">Nationality Number</label>
                                <input type="text" name="nationality_number" id="nationality_number" class="form-control @error('nationality_number') is-invalid @enderror" value="{{old() ? old('nationality_number') : (isset($employee->nationality_number) ? $employee->nationality_number : '' )}}" required>
                                
                                <span class="invalid-feedback">
                                    
                                    {{ $errors->has('nationality_number') ? $errors->first('nationality_number') : '' }}</span>
                            </div>
                            <div class="form-group">
                    <label for="">Gender</label>
                    <select name="gender_id" id="" class="form-control">
                        <option value="">Select </option>
                        @foreach($genders as $gender)
                        <option value="{{$gender->id}}">{{$gender->name}}</option>
                        @endforeach
                    </select>
                </div>
            
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{old() ? old('address') : (isset($employee->address) ? $employee->address : '' )}}" required>
                                
                                <span class="invalid-feedback">
                                    
                                    {{ $errors->has('address') ? $errors->first('address') : '' }}</span>
                            </div>
                            <div class="form-group">
                                <label for="salary">Salary</label>
                                <input type="text" name="salary" id="salary" class="form-control @error('salary') is-invalid @enderror" value="{{old() ? old('salary') : (isset($employee->salary) ? $employee->salary : '' )}}" required>
                                
                                <span class="invalid-feedback">
                                    
                                    {{ $errors->has('salary') ? $errors->first('salary') : '' }}</span>
                            </div>
                            <div class="form-group">
                            <label for="about_you">About You</label>
                            <textarea name="about_you" id="about_you"  rows="5" placeholder="Enter about_you" class="form-control @error('about_you') is-invalid @enderror">
                                {{old() ? old('about_you') : (isset($employee->about_you) ? $employee->about_you : '' )}}
                            </textarea>
                            <span class="invalid-feedback">{{$errors->has('about_you') ? $errors->first('about_you') : ''}}</span>
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
                                <a href="{{url('admin/employee')}}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
        @endsection
        
        