@extends('admins.layouts.master')
@section('title','Table Type')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-title m-3">Table Type Form</h4>
                    <form action="{{isset($tableType) ? url('admin/table-type/'.$tableType->id) : url('admin/table-type') }}" method="POST">
                        @csrf
                        @if(isset($tableType))
                        @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old() ? old('name') : (isset($tableType->name) ? $tableType->name : '' )}}" required>

                                <span class="invalid-feedback">

                                    {{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-dot-circle-o"></i>Submit
                            </button>
                            <button class="btn btn-danger" type="reset">
                                <i class="fa fa-ban"></i>
                                Reset</button>
                                <a href="{{url('admin/table-type')}}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
        @endsection

