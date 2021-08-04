@extends('admins.layouts.master')
@section('title','Addition')
@section('content')

<div class="col-md-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">Order List</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm">
            <input type="text" class="form-control" placeholder="Search Mail">
            <div class="input-group-append">
              <div class="btn btn-primary">
                <i class="fas fa-search"></i>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->

      <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Canteen Name</th>
                    <th>User Name</th>
                    <th>Menu</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$loop->iteration + (10 * ($orders->currentPage() - 1))}}</td>
                    <td>{{$order->canteenInfo->name}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->subCategory->name}}</td>
                    <td>{{$order->qty}}</td>
                    <td>{{$order->status}}</td>
                    <td>

                            <a class="btn btn-primary btn-sm mb-1" href="{{url('admin/order-detail/'.$order->id)}}">
                                <i class="fa fa-eye"></i>
                            </a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
