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
 * demo
*/
Route::get('/register','MemberController@add');
Route::get('/member/add','MemberController@add');
Route::post('/member/add','MemberController@addMember');
Route::get('/member/manage','MemberController@manageMember');
Route::get('/member/edit/{id}','MemberController@showEditForm');
Route::post('/member/edit/{id}','MemberController@updateMemberInfo');
Route::get('/member/bill-list/{id}','MemberController@showBillList');
Route::get('/member/delete/{id}','MemberController@deleteMember');

Route::get('/bazar/assign','BazarController@assign');
Route::post('/bazar/assign','BazarController@assignMember');

