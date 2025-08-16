<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\Front\BrandController;
use App\Http\Controllers\Front\PartnerController;
// use App\Http\Controllers\Admin\RolesController;
// use App\Http\Controllers\Admin\PermissionsController;

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

/**
 * Home Routes
 */

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'searchProduct'])->name('searchProduct');



Route::get('/san-pham/{slugParent}/{slugChild?}/{slugChildLevel?}', [ProductController::class, 'categoryProduct'])->name('product');
Route::get('/bai-viet-san-pham/{aliasCate?}/{aliasPro?}', [ProductController::class, 'detailProduct'])->name('detailProduct');

Route::get('/gio-hang', [ProductController::class, 'checkout'])->name('checkout');
Route::post('/add-to-cart', [ProductController::class, 'addToCart'])->name('addToCart');
Route::post('/update-cart', [ProductController::class, 'updateCart'])->name('updateCart');
Route::get('/delete-cart/{id}', [ProductController::class, 'deleteCart'])->name('deleteCart');

Route::get('/thong-tin-khach-hang', [ProductController::class, 'getClientInformation'])->name('getClientInformation');
Route::get('/thanh-toan-thanh-cong', [ProductController::class, 'getSuccess'])->name('getSuccess');
Route::get('load-city/{id}', [ProductController::class, 'loadCity'])->name('loadCity');

Route::post('client-information', [ProductController::class, 'clientInformation'])->name('clientInformation');

Route::post('get-image-color', [ProductController::class, 'getImageColor'])->name('getImageColor');


Route::get('tin-tuc/{alias}/{aliasChill?}/{aliasChilllevel?}', [NewsController::class, 'index'])->name('categoryNews');
Route::get('bai-viet-tin-tuc/{alias}', [NewsController::class, 'detailNews'])->name('detailNews');

Route::get('thuong-hieu/{alias?}', [BrandController::class, 'getBrand'])->name('getBrand');
Route::get('bai-viet/{alias?}/{id?}', [BrandController::class, 'getDetailBrand'])->name('getDetailBrand');


Route::get('doi-tac', [PartnerController::class, 'getPartner'])->name('getPartner');
Route::get('chi-tiet/{alias?}', [PartnerController::class, 'getDetailPartner'])->name('getDetailPartner');



Route::get('lien-he', [HomeController::class, 'getContact'])->name('getContact');

Route::get('chinh-sach-va-quy-dinh/{link?}', [HomeController::class, 'getPage'])->name('getPage');




Route::get('/clear-cache', function() {
    Artisan::call('optimize');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    return 'Application cache cleared';
});
