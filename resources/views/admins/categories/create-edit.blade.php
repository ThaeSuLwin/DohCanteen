@extends('admins.layouts.master')
@section('title','Category')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-title m-3">Category Form</h4>
                    <form action="{{isset($category) ? url('admin/category/'.$category->id) : url('admin/category') }}" method="POST">
                        @csrf
                        @if(isset($category))
                        @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="form_group">
                                    <label for="">Canteen</label>
                                    <select name="canteen_info_id" id="" class="form-control">
                                        <option value="">Select </option>
                                        @foreach($canteenInfos as $canteenInfo)
                                        <option value="{{$canteenInfo->id}}">{{$canteenInfo->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old() ? old('name') : (isset($category->name) ? $category->name : '' )}}" required>

                                <span class="invalid-feedback">

                                    {{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-dot-circle-o"></i>Submit
                            </button>
                            <button class="btn btn-danger" type="reset">
                                <i class="fa fa-ban"></i>
                                Reset</button>
                                <a href="{{url('admin/category')}}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
        @endsection

