@extends('admins.layouts.master')
@section('title','Table')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-title m-3">Table Form</h4>
                    <form action="{{isset($table) ? url('admin/table/'.$table->id) : url('admin/table') }}" method="POST">
                        @csrf
                        @if(isset($table))
                        @method('PUT')
                        @endif
                        <div class="card-body">
                        <div class="form-group">
                    <label for="">Table Type</label>
                    <select name="table_type_id" id="" class="form-control">
                        <option value="">Select </option>
                        @foreach($tableTypes as $tableType)
                        <option value="{{$tableType->id}}">{{$tableType->name}}</option>
                        @endforeach
                    </select>
                </div>
                            <div class="form-group">
                                <label for="table_number">Name</label>
                                <input type="text" name="table_number" id="table_number" class="form-control @error('table_number') is-invalid @enderror" value="{{old() ? old('table_number') : (isset($table->table_number) ? $table->table_number : '' )}}" required>
                                
                                <span class="invalid-feedback">
                                    
                                    {{ $errors->has('table_number') ? $errors->first('table_number') : '' }}</span>
                            </div>
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-dot-circle-o"></i>Submit
                            </button>
                            <button class="btn btn-danger" type="reset">
                                <i class="fa fa-ban"></i>    
                                Reset</button>
                                <a href="{{url('admin/table')}}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
        @endsection
        
        