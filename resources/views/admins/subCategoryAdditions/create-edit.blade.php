@extends('admins.layouts.master')
@section('title','SubCategory Addition')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-title m-3">Sub-Category Addition Form</h4>
                    <form action="{{isset($subCategoryAddition) ? url('admin/subCategoryAddition/'.$subCategoryAddition->id) : url('admin/subCategoryAddition') }}" method="POST">

                        @csrf
                        @if(isset($subCategoryAddition) && $subCategoryAddition != null)

                        @method('PUT')
                        @endif
                        <div class="card-body">
                        <div class="form_group">
                    <label for="">SubCategory</label>
                    <select name="sub_category_id" id="" class="form-control">
                        <option value="">Select </option>
                        @foreach($subCategories as $subCategory)
                        <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form_group">
                    <label for="">Main Addition</label>
                    <select name="addition_id" id="" class="form-control">
                        <option value="">Select </option>
                        @foreach($additions as $addition)
                        <option value="{{$addition->id}}">{{$addition->name}}</option>
                        @endforeach
                    </select>
                </div>
</br>
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-dot-circle-o"></i>Submit
                            </button>
                            <button class="btn btn-danger" type="reset">
                                <i class="fa fa-ban"></i>
                                Reset</button>
                                <a href="{{url('admin/subCategoryAddition')}}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
        @endsection

