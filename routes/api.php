<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/category','Api\CategoryController');

Route::post('/image','Api\ImageController@StoreImage');

Route::post('/admin/login','Api\AdminController@Login');

Route::get('/member','Api\MemberController@ShowMember');

Route::get('/member/{id}/edit','Api\MemberController@InfoMember');

Route::put('/member/{id}','Api\MemberController@EditMember');

Route::post('/member/approve/{id}','Api\MemberController@ApproveMember');

Route::post('/member/cancle-approve/{id}','Api\MemberController@CancleApproveMember');

Route::post('/member/admin/{id}','Api\MemberController@AdminMember');

Route::post('/member/cancle-admin/{id}','Api\MemberController@CancleAdminMember');

Route::post('/member/ban/{id}','Api\MemberController@BanMember');

Route::post('/member/cancle-ban/{id}','Api\MemberController@CancleBanMember');

Route::resource('/product','Api\ProductController');

Route::resource('/carousel','Api\CarouselController');

Route::resource('/banner','Api\BannerController');

Route::resource('/sub-category','Api\SubCategoryController');