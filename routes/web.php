<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

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

Route::controller(MemberController::class)->group(function(){
    Route::get('/member', 'index');
    Route::get('/member/add', 'add')->name('add');
    Route::post('/member/add', 'tambah');
    Route::post('/member/cari', 'cari')->name('ciber');
    Route::get('/member/delete/{id}', 'delete');
    Route::get('/member/update/{id}', 'edit');
    Route::post('/member/update/{id}', 'update');
});
