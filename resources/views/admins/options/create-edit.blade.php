@extends('admins.layouts.master')
@section('title','Option')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-title m-3">Ingredient Form</h4>
                    <form action="{{isset($option) ? url('admin/option/'.$option->id) : url('admin/option') }}" method="POST">
                        @csrf
                        @if(isset($option))
                        @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="form_group">
                                    <label for="">Main Ingredient</label>
                                    <select name="main_option_id" id="" class="form-control">
                                        <option value="">Select </option>
                                        @foreach($mainOptions as $mainOption)
                                        <option value="{{$mainOption->id}}">{{$mainOption->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old() ? old('name') : (isset($option->name) ? $option->name : '' )}}" required>
                                <span class="invalid-feedback">
                                    {{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{old() ? old('price') : (isset($option->price) ? $option->price : '' )}}" required>

                                <span class="invalid-feedback">

                                    {{ $errors->has('price') ? $errors->first('price') : '' }}</span>
                            </div>
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-dot-circle-o"></i>Submit
                            </button>
                            <button class="btn btn-danger" type="reset">
                                <i class="fa fa-ban"></i>
                                Reset</button>
                                <a href="{{url('admin/option')}}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
        @endsection

