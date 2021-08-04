@extends('users.layouts.master')

@section('content')
<!-- Content -->
<div id="content">

    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 offset-lg-4">

                    <h1 class="mb-0">Menu Grid</h1>
                    <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                </div>
            </div>
        </div>
    </div>


    <!-- Page Content -->
    <div class="page-content">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-3">
                    <!-- Menu Navigation -->
                    <nav id="menu-navigation" class="stick-to-content">
                        <ul class="catnav nav nav-menu bg-dark dark">

                            @foreach($categories as $category)
                            <li><a class="test"
                                    href="{{url('user/canteenInfo/'.$canteenInfo->id.'/category/'.$category->id)}}">{{$category->name}}</a>
                            </li>
                            @endforeach

                        </ul>
                    </nav>
                </div>
                <div class="col-md-9">
                    <!-- Menu Category / Burgers -->
                    <div id="Burgers" class="menu-category">
                        <div class="menu-category-title">
                            <div class="bg-image"><img src="/assets/menu1.jpg" alt=""></div>
                            <h2 class="title">
                                @foreach($subCategories as $subCategory)
                                {{$subCategory->category->name}}</h2>
                            @endforeach
                        </div>

                        <div class="menu-category-content padded">
                            <div class="row gutters-sm">
                                @foreach($subCategories as $subCategory)
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->

                                    <div class="menu-item menu-grid-item">

                                        <img class="mb-4"
                                            src="{{asset('storage/subCategory_images/'.$subCategory->image)}}"
                                            alt="image" style="height:200px">
                                        <h6 class="mb-0">{{$subCategory->name}}</h6>
                                        {{--@foreach($subCategory->options as $option)
                                        <span class="text-muted text-sm">
                                            {{$option->name}} ,
                                        </span>
                                        @endforeach--}}
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6">{{$subCategory->price}}MMK</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">

                                            <button
                                                    class="show_sub_category_btn btn btn-outline-secondary btn-sm"
                                                    data-sub_category_id="{{$subCategory->id}}" data-toggle="modal"
                                                    data-target="#product-modal" data-canteen_info_id="{{$subCategory->category->canteenInfo->id}}"
                                                    ><span>Add to cart</span></button></div>
                                        </div>

                                    </div>

                                </div>

                                @endforeach

                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>




</div>
<!-- Content / End -->

<div class="modal fade product-modal" id="product-modal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-lg dark bg-dark">
                <div class="bg-image"><img src="http://assets.suelo.pl/soup/img/photos/modal-add.jpg" alt=""></div>
                <h4 class="modal-title">Specify your dish</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti ti-close"></i></button>
            </div>
            <form action="{{url('admin/add-to-cart')}}" method="POST">
                @csrf


                <div class="modal-product-details" style="padding:10px 10px 0px 10px;">
                    <div class="row align-items-center">

                        <div class="col-7">

                            <h6 class="product-modal-name" id="sub_category_name"></h6>
                            <!-- <span class="text-muted product-modal-ingredients" id="" ></span> -->


                        </div>
                        <div class="col-3 text-lg text-right"><span id="sub_category_price"></span>MMK</div>

                    </div>
                </div>
                <input type="hidden" value="" name="sub_category_id" id="sub_category_id">
                <input type="hidden" value="" name="canteen_info_id" id="canteen_info_id">
                <div class="modal-body panel-details-container" style="padding:0px 20px 20px 20px;">
                    <!-- Panel Details / Size -->
                    <div class="panel-details panel-details-size">
                        <h5 class="panel-details-title">
                            <label class="custom-control custom-radio" style="margin-right: 5px;">
                                    <input name="" type="radio" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                </label>
                                <div>
                                <label for="" id="option">
                                    Ingredients
                                </label>
                                </div>

                        </h5>

                            <ul style="list-style: none; margin:0px; padding:0px;">
                                <li id="option_div" data-status="hidden"></li>
                            </ul>
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

                            <ul style="list-style: none; margin:0px; padding:0px;">
                                <li id="addition_div" data-status="hidden"></li>
                            </ul>


                    </div>
                     <!-- Panel Details / Other -->
                     <div class="panel-details panel-details-form">
                        <h5 class="panel-details-title">
                            <label class="custom-control custom-radio">
                                <input name="radio_title_other" type="radio" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                            </label>
                            <a href="#panel-details-other" data-toggle="collapse">Other</a>
                        </h5>
                    <div id="panel-details-other" class="collapse">
                 <textarea name="other" cols="30" rows="4" class="form-control" placeholder="Put this any other informations..."></textarea>

                        </div>
                    </div>
                <div class="row col-md-12" style="margin:20px">
                    <button class="btn btn-primary cart" type="submit" style="width:150px; margin-right:20px">
                        Add to cart
                    </button>

                </div>






        </div>
        </form>
    </div>
</div>




@endsection

@section('javascript')

<script>
    $('.cart').click(function() {
        alert('Your Order Add to Cart');
    })
    // var other = $('#other_id').data('status');

    // $('#other').click(function() {
    //     if (other == 'hidden') {
    //         $('#other_id').attr('hidden', true);
    //         other = 'show';
    //     } else if (other == 'show') {
    //         $('#other_id').attr('hidden', false);
    //         other = 'hidden';
    //     }


    // });
    var addition = $('#addition_div').data('status');

    $('#addition').click(function() {
        if (addition == 'hidden') {
            $('#addition_div').attr('hidden', true);
            addition = 'show';
        } else if (addition == 'show') {
            $('#addition_div').attr('hidden', false);
            addition = 'hidden';
        }


    });

    var option = $('#option_div').data('status');

$('#option').click(function() {
    if (option == 'hidden') {
        $('#option_div').attr('hidden', true);
        option = 'show';
    } else if (option == 'show') {
        $('#option_div').attr('hidden', false);
        option = 'hidden';
    }


});
    $('.show_sub_category_btn').click(function() {


        var subCategoryId = $(this).data('sub_category_id');
        var canteenInfoId = $(this).data('canteen_info_id');
        $('#canteen_info_id').val(canteenInfoId);
        console.log(subCategoryId);
        $.get("/api/sub-categories/" + subCategoryId + "/options", function(data) {

            var subCategoryWithOptions = data;
            $('#sub_category_name').html(subCategoryWithOptions.name);
            $('#sub_category_id').val(subCategoryWithOptions.id);
            $('#sub_category_price').html(subCategoryWithOptions.price);

            $(subCategoryWithOptions.options).each(function(index, value) {
                $('#option_div').append('<div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="options[]" value="' + value.id + '"  checked></br> <label class="form-check-label" for="inlineCheckbox1">' + value.name + '</label>(<label class="form-check-label" for="inlineCheckbox1">' + value.price + 'MMK</label>) </div>')
            });

            $(subCategoryWithOptions.additions).each(function(index, value) {
                $('#addition_div').append('<div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="additions[]" value="' + value.id + '"  ></br> <label class="form-check-label" for="inlineCheckbox1">' + value.name + '</label>(<label class="form-check-label" for="inlineCheckbox1">' + value.price + 'MMK</label>)</div>')
            });

        });

    });
</script>



@endsection
