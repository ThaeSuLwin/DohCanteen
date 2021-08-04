@extends('users.layouts.master')
@section('mastercontent')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
a {
        color: black;
        padding: 0;
        margin: 0;
    }

    li a:hover {
        text-decoration: none;
        color: rgb(165, 113, 16);
    }

    .test {
        color: white;
    }

    .catnav {
        padding-left: 35px;
        padding-right: 35px;
        padding-top: 21px;
        padding-bottom: 21px;
    }
.text{
    margin-bottom: 2px;
    margin-top : 3px;
   color: #40c5acf2;
   font-size:16px;
}

    </style>

<div class="container">

   <!-- Section -->
   <section class="section bg-light">

<div class="container">
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="cart-details shadow bg-white stick-to-content mb-4">
                <div class="bg-dark dark p-4"><h5 class="mb-0">You order</h5></div>
                <table class="cart-table">
                    <tr>
                        <td class="title">
                            <span class="name"><a href="#product-modal" data-toggle="modal">Pizza Chicked BBQ</a></span>
                            <span class="caption text-muted">26”, deep-pan, thin-crust</span>
                        </td>
                        <td class="price">$9.82</td>
                        <td class="actions">
                            <a href="#product-modal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                            <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="title">
                            <span class="name"><a href="#product-modal" data-toggle="modal">Beef Burger</a></span>
                            <span class="caption text-muted">Large (500g)</span>
                        </td>
                        <td class="price">$9.82</td>
                        <td class="actions">
                            <a href="#product-modal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                            <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="title">
                            <span class="name"><a href="#product-modal" data-toggle="modal">Extra Burger</a></span>
                            <span class="caption text-muted">Small (200g)</span>
                        </td>
                        <td class="price text-success">$0.00</td>
                        <td class="actions">
                            <a href="#product-modal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                            <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="title">
                            <span class="name">Weekend 20% OFF</span>
                        </td>
                        <td class="price text-success">-$8.22</td>
                        <td class="actions"></td>
                    </tr>
                </table>
                <div class="cart-summary">
                    <div class="row">
                        <div class="col-7 text-right text-muted">Order total:</div>
                        <div class="col-5"><strong>$<span class="cart-products-total">0.00</span></strong></div>
                    </div>
                    <div class="row">
                        <div class="col-7 text-right text-muted">Devliery:</div>
                        <div class="col-5"><strong>$<span class="cart-delivery">0.00</span></strong></div>
                    </div>
                    <hr class="hr-sm">
                    <div class="row text-lg">
                        <div class="col-7 text-right text-muted">Total:</div>
                        <div class="col-5"><strong>$<span class="cart-total">0.00</span></strong></div>
                    </div>
                </div>
                <div class="cart-empty">
                    <i class="ti ti-shopping-cart"></i>
                    <p>Your cart is empty...</p>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7 order-lg-first">
            <div class="bg-white p-4 p-md-5 mb-4">
            
        <h3 style="text-align: center;">Your Order Details:</h3>
           @foreach($orders as $order)
                <div class="row">
                
                 <div class="col-md-3">
                 <img class="mb-4"
                src="{{asset('storage/subCategory_images/'.$order->subCategory->image)}}"
                 alt="image" style="height:100px">
                </div>
               
                <div class="col-md-5">
                <p style="font-weight: bold; font-size:20px; margin-bottom: 3px;"> 
                {{$order->subCategory->name}} (Quantity: {{$order->quantity}}) </p>
                <p class="text"> Ingredients </p> 
                @foreach($order->subCategory->options as $option)
                 {{$option->name}} <span>,</span>
                @endforeach
                <p class="text">  Addition </p> 
                @foreach($order->subCategory->additions as $addition)
                    {{$addition->name}} <span>,</span>
                @endforeach
                <p class="text">Other</p>
                <p>{{$order->other}}</p>
               
                
                </div>
                <div class="col-md-2">
                {{$order->subCategory->price}}MMK
                </div>
            
               
        <div class="col-md-2">
        <div class="row">
        
        <button  class="btn btn-primary btn-sm mr-3" data-orderId="{{$order->id}}" data-toggle="modal" data-target="#order_edit"><i class="fa fa-edit"></i></button>
                <form action="{{url('admin/order/'.$order->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                <a class="btn btn-primary btn-sm " href="{{url('admin/order/'.$order->id.'/delete')}}">
                <i class="fa fa-trash"></i>
                     </a>
                                </form>
        </div>
                 
                                
                </div>
                </div>
                @endforeach
                <h4 class="border-bottom pb-4"><i class="ti ti-package mr-3 text-primary"></i>Delivery</h4>
                <div class="row mb-5">
                    <div class="form-group col-sm-6">
                        <label>Delivery time:</label>
                        <div class="select-container">
                            <select class="form-control">
                                <option>As fast as possible</option>
                                <option>In one hour</option>
                                <option>In two hours</option>
                            </select>
                        </div>
                    </div>
                </div>

                <h4 class="border-bottom pb-4"><i class="ti ti-wallet mr-3 text-primary"></i>Payment</h4>
                <div class="row text-lg">
                    <div class="col-md-4 col-sm-6 form-group">
                        <label class="custom-control custom-radio">
                            <input type="radio" name="payment_type" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">PayPal</span>
                        </label>
                    </div>
                    <div class="col-md-4 col-sm-6 form-group">
                        <label class="custom-control custom-radio">
                            <input type="radio" name="payment_type" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Credit Card</span>
                        </label>
                    </div>
                    <div class="col-md-4 col-sm-6 form-group">
                        <label class="custom-control custom-radio">
                            <input type="radio" name="payment_type" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Cash</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-primary btn-lg"><span>Order now!</span></button>
            </div>
        </div>
    </div>
</div>

</section>






<!-- Modal / Product -->
<div class="modal fade product-modal" id="order_edit" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-lg dark bg-dark">
                <div class="bg-image"><img src="http://assets.suelo.pl/soup/img/photos/modal-add.jpg" alt=""></div>
                <h4 class="modal-title">Specify your dish</h4>
                <button style="margin-left: 50px;" type="button" class="close" data-dismiss="modal"
                    aria-label="Close"><i class="ti ti-close"></i></button>
            </div>
            <form action="{{url('admin/order/'.$order->id)}}" method="POST">
                @csrf
               
            
                <div class="modal-product-details">
                    <div class="row align-items-center">

                        <div class="col-9">

                            <h6 class="mb-1 product-modal-name" id="sub_category_name"></h6>
                          
                            <!-- <span class="text-muted product-modal-ingredients" id="" ></span> -->


                        </div>
                        <div class="col-3 text-lg text-right"><span class="product-modal-price"></span></div>

                    </div>
                </div>
                <input type="hidden" value="{{$order->subCategory->id}}" name="sub_category_id" id="sub_category_id">.
                <div class="modal-body panel-details-container">
                    <!-- Panel Details / Size -->
                    <div class="panel-details panel-details-size">
                        <h5 class="panel-details-title">
                            <label class="custom-control custom-radio" style="margin-right: 5px;">
                                <input name="" type="radio" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                            </label>
                            Ingredients
                        </h5>
                        <div>
                        <ul style=" column-count: 2;column-gap: 2rem;list-style: none;">
                       
                @foreach($order->subCategory->options as $option) 
                <li><input class="form-check-input" type="checkbox" name="options[]" value="{{$option->id}}"  checked><label class="form-check-label" for="inlineCheckbox1"> {{$option->name}} </label>(<label class="form-check-label" for="inlineCheckbox1"> {{$option->price}} </label>)</li>
                @endforeach
                        </ul>


                        </div>

                    </div>
                    <!-- Panel Details / Additions -->
                    <div class="panel-details panel-details-additions">
                        <h5 class="panel-details-title">
                            <label class="custom-control custom-radio" style="margin-right: 5px;">
                                <input name="radio_title_additions" type="radio" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                            </label>
                            <div class="btn_addition">
                            <label for="" id="addition">
                             Additions
                             </label> 
                            
                            </div>
                            
                        </h5>
                        <div>
                        <ul style=" column-count: 2;column-gap: 2rem;list-style: none;"  >
                        
                        <li id="addition_div" data-status="hidden">
                        @foreach($order->subCategory->additions as $addition) 
                        <input class="form-check-input" type="checkbox" name="additions[]" value="{{$addition->id}}" ><label class="form-check-label" for="inlineCheckbox1"> {{$addition->name}} </label>(<label class="form-check-label" for="inlineCheckbox1"> {{$addition->price}} </label>)</li>
                @endforeach
                        
                        </ul>
                 

                        </div>

                    </div>
                    <!-- Panel Details / Other -->
                    <div class="panel-details panel-details-form">
                        <h5 class="panel-details-title">
                            <label class="custom-control custom-radio" style="margin-right: 5px;">
                                <input name="radio_title_other" type="radio" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                            </label>
                          
                            <div class="btn_other">
                            <label for="other" id="other">
                                Others:
                            </label>
                            <textarea name="other" data-status="hidden"  id="other_id" cols="43" rows="5" >{{$order->other}}</textarea>
                            </div>
                            
                            
                            
                        </h5>
                        </div>
                   
                    <div class="panel-details panel-details-form">
                        <h5 class="panel-details-title">
                            <label class="custom-control custom-radio" style="margin-right: 5px;">
                                <input name="radio_title_other" type="radio" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                            </label>
                          
                            
                            <label for="other" style="margin-right:10px;">
                                Quantity: 
                            </label>
                            <input type="number" name="quantity" id="" value="{{$order->quantity}}">
                            
                            
                            
                        </h5>
                        </div>
                    </div>
        
                    <div class="row col-md-12" style="margin:20px">
                    <button onclick="myFunction()" class="btn btn-primary" type="submit" id="cart" style="width:150px; margin-right:20px">
                        Update Cart
                    </button>
                    <a href="" >
                        <button class="btn btn-warning" type="cancel" style="width:150px; margin-left:20px">
                            cancel
                        </button></a>
                </div>
        

                    
                   


                </div>
            </form>
        </div>
    </div>
</div>






@endsection
@section('javascript')
<script src="{{ asset('dist/js/core.js') }}"></script>
<script>
$('.cart').click(function(){
        alert('Your Order Add to Cart');
    })
    var other = $('#other_id').data('status');
    
    $('#other').click(function(){
        if( other == 'hidden')
        {
        $('#other_id').attr('hidden',true);
        other = 'show';
        }
    else if( other == 'show')
    {
        $('#other_id').attr('hidden',false);
        other = 'hidden';
    }
     
      
    });
    var addition = $('#addition_div').data('status');
    
    $('#addition').click(function(){
        if( addition == 'hidden')
        {
        $('#addition_div').attr('hidden',true);
        addition = 'show';
        }
    else if( addition == 'show')
    {
        $('#addition_div').attr('hidden',false);
        addition = 'hidden';
    }
     
      
    });
   
    $('.show_sub_category_btn').click(function () {


        var orderId = $(this).data('order_id');
        console.log(orderId);
        $.get("/api/orders/" + orderId + "/options", function (data) {

            var orders = data;
            $('#sub_category_name').html(orders.name);
            $('#sub_category_id').val(orders.id);

            $(orders.options).each(function (index, value) {
                $('#option_div').append('<li><input class="form-check-input" type="checkbox" name="options[]" value="' + value.id + '"  checked><label class="form-check-label" for="inlineCheckbox1">' + value.name + '</label>(<label class="form-check-label" for="inlineCheckbox1">' + value.price + 'MMK</label>)</li>')
            });

            $(orders.additions).each(function (index, value) {
                $('#addition_div').append('<li><input class="form-check-input" type="checkbox" name="additions[]" value="' + value.id + '"  ><label class="form-check-label" for="inlineCheckbox1">' + value.name + '</label>(<label class="form-check-label" for="inlineCheckbox1">' + value.price + 'MMK</label>)</li>')
            });

        });

    });
</script>



@endsection