@extends('users.layouts.master')

@section('mastercontent')
<style>
    
    </style>
<div class="container" style=margin-top:41px;>
    <div class="row">
    @foreach($subCategories as $subCategory)
        <div class="col-md-3">
     
            <div class="card">
                <img src="\assets\img\noodle.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$subCategory->name}}</h5>
                    <a href="{{ url('UI/canteen/'.$canteenId .'/subCategory/'.$subCategory->id)}}"><button class="btn btn-success">Order</button></a>
                   
                </div>
</div>

            </div>
            @endforeach
</div>
    
    {{$subCategories}}
</div>

@endsection