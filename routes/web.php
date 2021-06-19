<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
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
use App\Models\TheLoai;
Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dangnhap','App\Http\Controllers\UserController@getDangnhapAdmin');
Route::post('admin/dangnhap','App\Http\Controllers\UserController@postDangnhapAdmin');
Route::get('admin/logout','App\Http\Controllers\UserController@getDangXuatAdmin');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
    Route::group(['prefix'=>'theloai'],function(){
        //admin/theloai/them
        Route::get('danhsach','App\Http\Controllers\TheLoaiController@getDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\TheLoaiController@getSua');
        Route::post('sua/{id}','App\Http\Controllers\TheLoaiController@postSua');

        Route::get('them','App\Http\Controllers\TheLoaiController@getThem');
        Route::post('them','App\Http\Controllers\TheLoaiController@postThem');

        Route::get('xoa/{id}','App\Http\Controllers\TheLoaiController@getxoa');
    });

    Route::group(['prefix'=>'loaitin'],function(){
        //admin/loaitin/them
        Route::get('danhsach','App\Http\Controllers\LoaiTinController@getDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\LoaiTinController@getSua');
        Route::post('sua/{id}','App\Http\Controllers\LoaiTinController@postSua');

        Route::get('them','App\Http\Controllers\LoaiTinController@getThem');
        Route::post('them','App\Http\Controllers\LoaiTinController@postThem');

        Route::get('xoa/{id}','App\Http\Controllers\LoaiTinController@getxoa');
    });

    Route::group(['prefix'=>'tintuc'],function(){
        //admin/tintuc/them
        Route::get('danhsach','App\Http\Controllers\TinTucController@getDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\TinTucController@getSua');
        Route::post('sua/{id}','App\Http\Controllers\TinTucController@postSua');

        Route::get('them','App\Http\Controllers\TinTucController@getThem');
        Route::post('them','App\Http\Controllers\TinTucController@postThem');

        Route::get('xoa/{id}','App\Http\Controllers\TinTucController@getxoa');
    });

    Route::group(['prefix'=>'ajax'],function(){
        Route::get('loaitin/{idTheLoai}','App\Http\Controllers\AjaxController@getLoaiTin');
    });

    Route::group(['prefix'=>'slide'],function(){
        //admin/slide
        Route::get('danhsach','App\Http\Controllers\SlideController@getDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\SlideController@getSua');
        Route::post('sua/{id}','App\Http\Controllers\SlideController@postSua');

        Route::get('them','App\Http\Controllers\SlideController@getThem');
        Route::post('them','App\Http\Controllers\SlideController@postThem');

        Route::get('xoa/{id}','App\Http\Controllers\SlideController@getxoa');
    });

    Route::group(['prefix'=>'user'],function(){
        //admin/slide
        Route::get('danhsach','App\Http\Controllers\UserController@getDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\UserController@getSua');
        Route::post('sua/{id}','App\Http\Controllers\UserController@postSua');

        Route::get('them','App\Http\Controllers\UserController@getThem');
        Route::post('them','App\Http\Controllers\UserController@postThem');

        Route::get('xoa/{id}','App\Http\Controllers\UserController@getxoa');
    });

    Route::group(['prefix'=>'comment'],function(){
        Route::get('xoa/{id}/{idTinTuc}','App\Http\Controllers\CommentController@getxoa');
    });
});

Route::get('trangchu','App\Http\Controllers\PagesController@trangchu');
Route::get('lienhe','App\Http\Controllers\PagesController@lienhe');
Route::get('loaitin/{id}/{TenKhongDau}.html','App\Http\Controllers\PagesController@loaitin');
Route::get('tintuc/{id}/{TieuDeKhongDau}.html','App\Http\Controllers\PagesController@tintuc');
Route::get('dangnhap','App\Http\Controllers\PagesController@getDangnhap');
Route::post('dangnhap','App\Http\Controllers\PagesController@postDangnhap');
Route::get('dangxuat','App\Http\Controllers\PagesController@dangxuat');
Route::get('nguoidung','App\Http\Controllers\PagesController@getNguoidung');
Route::post('nguoidung','App\Http\Controllers\PagesController@postNguoidung');
Route::get('dangky','App\Http\Controllers\PagesController@getDangky');
Route::post('dangky','App\Http\Controllers\PagesController@postDangky');

Route::post('comment/{id}','App\Http\Controllers\CommentController@postComment');

Route::post('timkiem','App\Http\Controllers\PagesController@timkiem');
