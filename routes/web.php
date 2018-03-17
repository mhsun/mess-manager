<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * Member related url
*/

Route::get('/register','MemberController@add');
Route::get('/member/add','MemberController@add');
Route::post('/member/add','MemberController@addMember');
Route::get('/member/manage','MemberController@manageMember');
Route::get('/member/edit/{id}','MemberController@showEditForm');
Route::post('/member/edit/{id}','MemberController@updateMemberInfo');
Route::get('/member/bill-list/{id}','MemberController@showBillList');
Route::get('/member/delete/{id}','MemberController@deleteMember');
Route::get('/member/make-leave/{id}','MemberController@showLeaveForm');
Route::post('/member/make-leave/{id}','MemberController@leaveMember');
Route::get('/member/show-bill/{id}','MemberController@showMemberBill');

Route::get('/bazar/assign','BazarController@assign');
Route::post('/bazar/assign','BazarController@assignMember');
Route::get('/bazar/manage','BazarController@manageAssignedMembers');

/*
 * Monthly Bill related url
*/
Route::get('/monthly-bill/add','MonthlyBillController@showMonthlyBillForm');
Route::post('/monthly-bill/add','MonthlyBillController@insertMonthlyBill');
Route::get('/monthly-bill/manage','MonthlyBillController@manage');
Route::get('/monthly-bill/edit/{id}','MonthlyBillController@showEditForm');
Route::post('/monthly-bill/edit/{id}','MonthlyBillController@updateMonthlyBill');

