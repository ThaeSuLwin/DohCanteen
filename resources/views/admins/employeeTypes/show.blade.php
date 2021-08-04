@extends('admins.layouts.master')
@section('title','employeeType')
@section('content')
<div class="col-12">
    <div class="card">
        <h4 class="card-title m-3">EmployeeType List</h4> 
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Canteen</th>
                            <th>Employee Type</th>
                            <th>Employee Name</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                        @foreach($employees as $employee)
                        <tr>
                        <td>{{$employee->id}}</td>
                            <td>
                            
                            {{$employee->canteenInfo->name}}
                           
                            </td>
                            <td>{{$employee->employeeType->name}}</td>
                           
                            
                            <td>
                          
                            {{$employee->name}}
                           
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
@endsection