@extends('layouts.master')

@section('mastercontent')
<style>
    
    </style>
<div class="container" style=margin-top:41px;>
    <div class="row">
    @foreach($tableTypes as $tableType)
        <div class="col-md-3">
     
            <div class="card">
                <img src="\assets\img\noodle.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$tableType->name}}</h5>
                    <p class="card-text">{{$tableType->description}}</p>
                    <a href="{{ url('UI/show/'.$tableType->id)}}"><button class="btn btn-success">Booking</button></a>
                </div>
</div>

            </div>
            @endforeach
</div>
    
    {{$tableTypes}}
</div>

@endsection


