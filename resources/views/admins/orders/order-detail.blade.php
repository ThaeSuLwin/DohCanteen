@extends('admins.layouts.master')
@section('title','Addition')
@section('content')
<div class="col-md-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">Order Detail</h3>
      </div>
    </div>
<div class="table-responsive">
    <table class="table table-striped">
            <tr> <th>Canteen Name</th>

                <td>{{$orderDetail->canteenInfo->name}}</td>
            </tr>
            <tr> <th>User Name</th>

                <td>{{$orderDetail->user->name}}</td>
            </tr>
            <tr> <th>Menu Name</th>

                <td>{{$orderDetail->subCategory->name}}</td>
            </tr>
            <tr> <th>Ingredients</th>

                <td>
                    @foreach($orderDetailOptions as $orderDetailOption)
              <span class="pr-2">  {{$orderDetailOption->option->name}} , </span>
                    @endforeach
                </td>

            </tr>
            <tr> <th>Other Addtions</th>

                <td>
                    @foreach($orderDetailAdditions as $orderDetailAddition)
                    <span class="pr-2"> {{$orderDetailAddition->addition->name}} , </span>
                    @endforeach
                    </td>

            </tr>
            <tr> <th>Other Comments</th>

                <td>
                    @foreach($orderDetailOthers as $orderDetailOther)
                    <span class="pr-2"> {{$orderDetailOther->other}}  </span>
                    @endforeach
                    </td>

            </tr>
            <tr> <th>Total Price</th>

                <td>
                    {{$totalAmount}} MMK
                </td>

            </tr>
    </table>

    </div>

</div>

<div class="col-md-4">
    <button class="btn btn-danger"> <a href="{{url('/admin/order')}}"style="text-decoration:none; color:white"> Back</a>  </button>
</div>
@endsection
