<?php

// use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('home', 'PageController@getIndex')->name('trang-chu');

Route::get('loai-san-pham/{type}', 'PageController@getLoaiSP')->name('loaisanpham');
Route::get('chi-tiet-san-pham/{id}', 'PageController@getChitiet')->name('chitietsanpham');
Route::get('lien-he', 'PageController@getLienhe')->name('lienhe');
Route::get('gioi-thieu', 'PageController@getGioithieu')->name('gioithieu');

Route::get('add-to-cart/{id}','PageController@getAddtoCart')->name('themgiohang');

Route::get('del-cart/{id}','PageController@getDelItemCart')->name('xoagiohang');

Route::get('dat-hang','PageController@getCheckout')->name('dathang');
Route::post('dat-hang','PageController@postCheckout')->name('dathang');

Route::get('dang-nhap','PageController@getLogin')->name('dangnhap');
Route::post('dang-nhap','PageController@postLogin')->name('dangnhap');

Route::get('dang-ky','PageController@getSigup')->name('dangky');
Route::post('dang-ky','PageController@postSigup')->name('dangky');

Route::get('dang-xuat','PageController@postLogout')->name('dangxuat');

Route::get('search','PageController@getSearch')->name('search');

Route::get('admin','PageController@admin')->name('admin');

Route::get('xoa/{name}','ArticleController@destroy')->name('delete');

