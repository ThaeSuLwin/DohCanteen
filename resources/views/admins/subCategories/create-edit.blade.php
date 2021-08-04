@extends('admins.layouts.master')
@section('title','SubCategory')
@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-title m-3">Menu Form</h4>
                    <form action="{{isset($subCategory) ? url('admin/subCategory/'.$subCategory->id) : url('admin/subCategory') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($subCategory))
                        @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="form_group">
                                <label for="">Canteen</label>
                                <select name="canteen_info_id" id="canteen_info_id" class="form-control">
                                    <option value="">Select </option>
                                    @foreach($canteenInfos as $canteenInfo)
                                    <option value="{{$canteenInfo->id}}">{{$canteenInfo->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">

                                @if(isset($subCategory) && $subCategory->category->id)

                                <input id="categoryId" name="categoryId" type="hidden" value="{{$subCategory->category->id}}">
                                <input type="hidden" name="canteen_info_id" value="{{$subCategory->category->canteen_info_id}}">

                                @endif

                                <label for="category_id">Category</label><br>
                                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" style="width:100%;">
                                </select>
                                @error('category_id')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old() ? old('name') : (isset($subCategory->name) ? $subCategory->name : '' )}}" required>

                                <span class="invalid-feedback">

                                    {{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{old() ? old('price') : (isset($subCategory->price) ? $subCategory->price : '' )}}" required>

                                    <span class="invalid-feedback">

                                        {{ $errors->has('price') ? $errors->first('price') : '' }}</span>
                                    </div>
                                    <div class="form_group">
                                        <label for =""> Ingredients :</label></br>
                                        @foreach($options as $option)

                                        <input type="checkbox" class="checkbox-inline" name="option[]" value="{{$option->id}}"> <label for="">{{$option->name}}</label>
                                        @endforeach
                                    </div>
                                    <div class="form_group">
                                        <label for =""> Addition :</label></br>
                                        @foreach($additions as $addition)

                                        <input type="checkbox" class="checkbox-inline" name="addition[]" value="{{$addition->id}}"> <label for="">{{$addition->name}}</label>
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
                                            <i class="fa fa-ban"></i>Reset</button>
                                            <a href="{{url('admin/subCategory')}}" class="btn btn-secondary">Cancel</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endsection

            @section('javascript')
            <script>
                $("#option_id").select2({

                });
                $('#canteen_info_id').change(function(){

                    var canteenInfoId = $(this).val();
                    $('#category_id').html('<option value="">Select Category</option>');
                    $.get( "/api/categories/canteen-info/" + canteenInfoId, function( data ) {
                        var categories = data;
                        // $('#category_id')
                        $(categories).each(function(index,value){
                            $('#category_id').append('<option value="'+value.id+'">'+value.name+'</option>');

                        });

                    });


                });



            </script>

            @endsection
