@extends('admins.layouts.master')
@section('title','subCategoryOption')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-title m-3">subCategoryOption Form</h4>
                    <form action="{{isset($subCategoryOption) ? url('admin/subCategoryOption/'.$subCategoryOption->id) : url('admin/subCategoryOption') }}" method="POST">
                        @csrf
                        @if(isset($subCategoryOption))
                        @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="form_group">
                                <label for=""> SubCategory</label>
                                <select name="sub_category_id" id="" class="form-control">
                                    <option value="">Select </option>
                                    @foreach($subCategories as $subCategory)
                                    <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form_group">
                                <label for=""> Option</label>
                                <select name="option_id" id="" class="form-control">
                                    <option value="">Select </option>
                                    @foreach($options as $option)
                                    <option value="{{$option->id}}">{{$option->name}}</option>
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
                                <a href="{{url('admin/subCategoryOption')}}" class="btn btn-secondary">Cancel</a>
                          
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

