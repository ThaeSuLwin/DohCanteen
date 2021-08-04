@extends('admins.layouts.master')
@section('title','canteenInfoEmployeeType')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-title m-3">canteenInfoEmployeeType Form</h4>
                    <form action="{{isset($canteenInfoEmployeeType) ? url('admin/canteenInfoEmployeeType/'.$canteenInfoEmployeeType->id) : url('admin/canteenInfoEmployeeType') }}" method="POST">
                        @csrf
                        @if(isset($canteenInfoEmployeeType))
                        @method('PUT')
                        @endif
                        <div class="card-body">
                        <div class="form_group">
                    <label for=""> CanteenInfo</label>
                    <select name="csnteenInfo_id" id="" class="form_group">
                        <option value="">Select </option>
                        @foreach($canteenInfos as $canteenInfo)
                        <option value="{{$canteenInfo->id}}">{{$canteenInfo->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form_group">
                    <label for=""> Employee Type</label>
                    <select name="employee_type_id" id="" class="form_group">
                        <option value="">Select </option>
                        @foreach($employeeTypes as $employeeType)
                        <option value="{{$employeeType->id}}">{{$employeeType->name}}</option>
                        @endforeach
                    </select>
                </div>
                            
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-dot-circle-o"></i>Submit
                            </button>
                            <button class="btn btn-danger" type="reset">
                                <i class="fa fa-ban"></i>    
                                Reset</button>
                                <a href="{{url('admin/canteenInfoEmployeeType')}}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
        @endsection
        
        