<?php

// echo getName();
use Illuminate\Support\Facades\Route;


Route::redirect('/','user/landing');
  /* UI*/

Route::prefix('canteen')->group(function(){
    Route::get('/register','Auth\Canteen\RegisterController@showRegister')->name('canteen.register.show');
    Route::post('/register','Auth\Canteen\RegisterController@storeRegister')->name('canteen.register.store');

    Route::get('/login','Auth\Canteen\LoginController@showLoginForm')->name('canteen.login.show')->middleware('checkCanteen');
    Route::post('/login','Auth\Canteen\LoginController@login')->name('canteen.login')->middleware('checkCanteen');

});
Route::prefix('user')->group (function(){
    Route::get('/landing','UI\CanteenController@landing');
    Route::get('/canteenInfo','UI\CanteenController@canteenInfo')->middleware('auth');
    Route::get('/canteenInfo/{id}','UI\CanteenController@category');
    Route::get('/canteenInfo/{canteenInfoId}/category/{id}','UI\CanteenController@subCategory');
    Route::get('/check-order/{id}','Admin\OrderController@checkOrder');
    Route::get('/blog','UI\BlogController@index')->name('blog');
    Route::resource('/booking','UI\BookingController');
    Route::get('/check-out','Admin\AddToCartController@checkout');
    Route::get('/addToCartItems/removeItem/{id}','Admin\AddToCartController@removeItem');

    Route::get('/order','Admin\OrderController@store');
    // Route::get('/login','CanteenController@login');
    // Route::get('/register','CanteenController@create');
    // Route::post('/register/store','CanteenController@store');
    // Route::get('/canteen/{canteenId}', 'CanteenController@show');
    // Route::get('/canteen/{canteeninfoId}/category/{categoryId}', 'CanteenController@look');
    // Route::get('/canteen/{canteenId}/subcategory/{subcategoryId}','OrderController@index');
// /* checkorder */
// Route::get('/checkorder','checkOrderController@index');
// Route::get('/checkorder/delete/{id}','checkOrderController@delete');

});
Route::get('/error',function(){
    return view('users.error');
})->name('error');
  /* category*/
Route::prefix('admin')->group (function(){
    Route::get('/landing','Admin\LandingController@landing')->middleware(['auth','checkrole']);
    Route::resource('/category','Admin\CategoryController')->middleware(['auth','checkrole']);

    Route::get('/order','Admin\OrderController@order')->middleware(['auth','checkrole']);
    Route::get('/order-detail/{id}','Admin\OrderController@orderDetail')->middleware(['auth','checkrole']);
/* Order*/
Route::post('/add-to-cart','Admin\AddToCartController@addToCart');
Route::post('/order','Admin\OrderController@orderStore');

// Route::post('/order/{id}','Admin\OrderController@orderUpdate');
Route::get('/order/{id}/delete','Admin\OrderController@orderDelete');

/* Mainoption */
Route::resource('/mainOption','Admin\MainOptionController')->middleware(['auth','checkrole']);

/* Mainaddition */
Route::resource('/mainAddition','Admin\MainAdditionController')->middleware(['auth','checkrole']);

/* option */
Route::resource('/option','Admin\OptionController')->middleware(['auth','checkrole']);
/* addition */
Route::resource('/addition','Admin\AdditionController')->middleware(['auth','checkrole']);
// /* Subcategoryoption */
// Route::resource('/subCategoryOption','Admin\SubCategoryOptionController');
// /* subcategoryaddition */
// Route::resource('/subCategoryAddition','Admin\SubCategoryAdditionController')->middleware(['auth','checkrole']);

   /* Canteen Owner*/
    Route::resource('/canteenOwner','Admin\CanteenOwnerController')->middleware(['auth','checkrole']);
   /* Canteen Info */
   Route::resource('/canteenInfo','Admin\CanteenInfoController')->middleware(['auth','checkrole']);

 /* Subcategory*/
    Route::resource('/subCategory','Admin\SubCategoryController')->middleware(['auth','checkrole']);

/* Blog */
    Route::get('/blog','Admin\BlogController@index')->middleware(['auth','checkrole']);
    Route::post('/blog','Admin\BlogController@store')->middleware(['auth','checkrole']);
    Route::get('/blog/create','Admin\BlogController@create')->middleware(['auth','checkrole']);
    Route::get('/blog/{id}','Admin\BlogController@delete')->name("delete")->middleware(['auth','checkrole']);
    Route::get('/blog/edit/{id}','Admin\BlogController@edit')->name("edit")->middleware(['auth','checkrole']);
    Route::post('/blog/update/{id}','Admin\BlogController@update')->name('update')->middleware(['auth','checkrole']);

/* Booking */
    Route::resource('/booking','Admin\BookingController');


    Route::get('/user','Admin\UserController@index')->middleware(['auth','checkrole']);
    Route::post('/user','Admin\UserController@store')->middleware(['auth','checkrole']);
    Route::get('/user/create','Admin\UserController@create')->middleware(['auth','checkrole']);
    Route::get('/user/{id}','Admin\UserController@delete')->name("delete")->middleware(['auth','checkrole']);
    Route::get('/user/edit/{id}','Admin\UserController@edit')->name("edit")->middleware(['auth','checkrole']);
    Route::post('/user/update/{id}','Admin\UserController@update')->name('update')->middleware(['auth','checkrole']);

/* Meat */
// Route::resource('/meat','MeatController');
// /* Get langauge*/
//     Route::get('lang/{val}','AdminController@getlanguage');

// /*User */
//     Route::resource('/user','Admin/UserController');


//      /* Item*/
//     Route::get('/item/index','ItemController@index');
//     Route::get('/item/create','ItemController@create');
//     Route::post('/item/store','ItemController@store');
//     Route::get('/item/edit/{id}','ItemController@edit');
//     Route::post('/item/{id}/update','ItemController@update');
//     Route::get('/item/delete/{id}','ItemController@delete');

//  /* Table type*/
    Route::resource('/table-type','Admin\TableTypeController');
Route::resource('/user','Admin\UserController')->middleware(['auth','checkrole']);

// /* Table*/
    Route::resource('/table','Admin\TableController');

/* Gender */
Route::resource('/gender','Admin\GenderController')->middleware(['auth','checkrole']);
/* Employee*/
    Route::resource('/employee','Admin\EmployeeController')->middleware(['auth','checkrole']);


/* Employee Type*/
    Route::resource('/employeeType','Admin\EmployeeTypeController')->middleware(['auth','checkrole']);
    Route::get('/{canteenId}/employeeType/show/{id}','Admin\EmployeeTypeController@show')->middleware(['auth','checkrole']);

});


Auth::routes();
// Route::post('/logout','LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

// facebook login
Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');


// Route::get('logout',function(){
//     return redirect('/');
// });


Route::get('/google', 'GoogleController@redirectToGoogle');
Route::get('/google/callback', 'GoogleController@handleGoogleCallback');
