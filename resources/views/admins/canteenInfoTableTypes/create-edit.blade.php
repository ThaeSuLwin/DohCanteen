@extends('admins.layouts.master')
@section('title','canteenInfoTableType')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-title m-3">canteenInfoTableType Form</h4>
                    <form action="{{isset($canteenInfoTableType) ? url('admin/canteenInfoTableType/'.$canteenInfoTableType->id) : url('admin/canteenInfoTableType') }}" method="POST">
                        @csrf
                        @if(isset($canteenInfoTableType))
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
                    <label for=""> Table Type</label>
                    <select name="table_type_id" id="" class="form_group">
                        <option value="">Select </option>
                        @foreach($tableTypes as $tableType)
                        <option value="{{$tableType->id}}">{{$tableType->name}}</option>
                        @endforeach
                    </select>
                </div>
                            
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-dot-circle-o"></i>Submit
                            </button>
                            <button class="btn btn-danger" type="reset">
                                <i class="fa fa-ban"></i>    
                                Reset</button>
                                <a href="{{url('admin/canteenInfoTableType')}}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
        @endsection
        
        