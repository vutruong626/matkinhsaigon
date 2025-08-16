<?php

use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\CategoryNews\CategoryNewsController;
use App\Http\Controllers\Admin\Color\ColorController;
use App\Http\Controllers\Admin\Contact\ContactController;
use App\Http\Controllers\Admin\Material\MaterialController;
use App\Http\Controllers\Admin\News\NewsController;
use App\Http\Controllers\Admin\Page\PageController;
use App\Http\Controllers\Admin\Partner\PartnerController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Slider\SliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Customer\CustomerController;
use App\Http\Controllers\Admin\Customer\UserController;

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




// you can write coder router here it will't require login
Route::middleware(['guest'])->group(function() {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'getLogin')->name('login.getLogin');
        Route::post('/login', 'postLogin')->name('login.postLogin');
    });

});

// you can write coder router here it will require login
Route::middleware(['auth'])->group(function() {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'getHomeDashboard')->name('getHomeDashboard');
        Route::delete('/delete-item-order/{id?}', 'deleteOrder')->name('deleteOrder');
    });
    Route::controller(AuthController::class)->group(function () {
        Route::get('/logout', 'getLogout')->name('logout.getLogout');
    });
    
    Route::prefix('user')->group(function () {
        
        Route::controller(UserController::class)->group(function () {
            Route::get('/', 'getListCustomerUser')->name('user.getListCustomerUser')->middleware('role.level:manager2');

            Route::post('/', 'postAddCustomerUser')->name('user.postAddCustomerUser')->middleware('role.level:manager2');
            Route::post('/update', 'postUpdateCustomerUser')->name('user.postUpdateCustomerUser')->middleware('role.level:manager2');
            Route::delete('/{id}', 'deleteCustomerUser')->name('user.deleteCustomerUser')->middleware('role.level:manager2');


            Route::get('/change-pasword/{id?}', 'getChangePassword')->name('user.getChangePassword')->middleware('role.level:manager2');
            Route::post('/change-pasword/{id?}', 'postChangePassword')->name('user.postChangePassword')->middleware('role.level:manager2');
        });
    });

    Route::prefix('customer')->group(function () {
        Route::controller(CustomerController::class)->group(function () {
            Route::get('/', 'getListCustomer')->name('customer.getListCustomer')->middleware('role.level:staff');

            Route::post('/', 'postAddCustomer')->name('customer.postAddCustomer')->middleware('role.level:staff');
            Route::delete('/{id}', 'deleteCustomer')->name('customer.deleteCustomer')->middleware('role.level:staff');
        });
    });


    Route::prefix('slider')->group(function () {
        Route::controller(SliderController::class)->group(function () {
            Route::get('/', 'getListSlider')->name('slider.getListSlider')->middleware('role.level:staff');

            Route::get('/create-slider', 'getCreateSlider')->name('slider.getCreateSlider')->middleware('role.level:staff');
            Route::post('/create', 'postAddSlider')->name('slider.postAddSlider')->middleware('role.level:staff');

            Route::get('/update-slider/{id?}', 'getUpdateSlider')->name('slider.getUpdateSlider')->middleware('role.level:staff');
            Route::post('/update/{id?}', 'postUpdateSlider')->name('slider.postUpdateSlider')->middleware('role.level:staff');

            Route::delete('delete/{id?}', 'deleteSlider')->name('slider.deleteSlider')->middleware('role.level:staff');
        });
    });

    Route::prefix('category')->group(function () {
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/', 'getListCategory')->name('category.getListCategory')->middleware('role.level:staff');

            Route::get('/create-category', 'getCreateCategory')->name('category.getCreateCategory')->middleware('role.level:staff');
            Route::post('/create', 'postAddCategory')->name('category.postAddCategory')->middleware('role.level:staff');

            Route::get('/update-category/{id?}', 'getUpdateCategory')->name('category.getUpdateCategory')->middleware('role.level:staff');
            Route::post('/update/{id?}', 'postUpdateCategory')->name('category.postUpdateCategory')->middleware('role.level:staff');

            Route::delete('delete/{id?}', 'deleteCategory')->name('category.deleteCategory')->middleware('role.level:staff');



            Route::get('/featured-category', 'getListFeaturedCategory')->name('category.getListFeaturedCategory')->middleware('role.level:staff');

            Route::get('/create-featured-category', 'getCreateFeaturedCategory')->name('category.getCreateFeaturedCategory')->middleware('role.level:staff');
            Route::post('/add-featured-category', 'postCraeteFeaturedCategory')->name('category.postCraeteFeaturedCategory')->middleware('role.level:staff');

            Route::get('/update-featured-category/{id?}', 'getUpdateFeaturedCategory')->name('category.getUpdateFeaturedCategory')->middleware('role.level:staff');
            Route::post('/update-featured-category/{id?}', 'postUpdateFeaturedCategory')->name('category.postUpdateFeaturedCategory')->middleware('role.level:staff');

            Route::delete('delete-featured-category/{id?}', 'deleteFeaturedCategory')->name('category.deleteFeaturedCategory')->middleware('role.level:staff');

            Route::post('/get-category-price-sale', 'getCategoryPriceSale')->name('products.getCategoryPriceSale');

        });
    });

    Route::prefix('brands')->group(function () {
        Route::controller(BrandController::class)->group(function () {
            Route::get('/', 'getListBrand')->name('brand.getListBrand')->middleware('role.level:staff');

            Route::get('/create-brand', 'getCreateBrand')->name('brand.getCreateBrand')->middleware('role.level:staff');
            Route::post('/create', 'postAddBrand')->name('brand.postAddBrand')->middleware('role.level:staff');

            Route::get('/update-brand/{id?}', 'getUpdateBrand')->name('brand.getUpdateBrand')->middleware('role.level:staff');
            Route::post('/update/{id?}', 'postUpdateBrand')->name('brand.postUpdateBrand')->middleware('role.level:staff');

            Route::delete('delete/{id?}', 'deleteBrand')->name('brand.deleteBrand')->middleware('role.level:staff');
            Route::delete('delete-image/{id?}', 'deleteBrandImage')->name('brand.deleteBrandImage')->middleware('role.level:staff');
        });
    });

    Route::group(['prefix' => 'material'], function () {
        Route::controller(MaterialController::class)->group(function () {
            Route::get('/', 'getListMaterial')->name('material.getListMaterial')->middleware('role.level:staff');

            Route::post('/create', 'postAddMaterial')->name('material.postAddMaterial')->middleware('role.level:staff');

            Route::post('/update/{id?}', 'postUpdateMaterial')->name('material.postUpdateMaterial')->middleware('role.level:staff');

            Route::delete('delete/{id?}', 'deleteMaterial')->name('material.deleteMaterial')->middleware('role.level:staff');
        });
    });

    Route::group(['prefix' => 'color'], function () {
        Route::controller(ColorController::class)->group(function () {
            Route::get('/', 'getListColor')->name('color.getListColor')->middleware('role.level:staff');

            Route::get('/create-color', 'getCreateColor')->name('color.getCreateColor')->middleware('role.level:staff');
            Route::post('/create', 'postAddColor')->name('color.postAddColor')->middleware('role.level:staff');

            Route::get('/update-color/{id?}', 'getUpdateColor')->name('color.getUpdateColor')->middleware('role.level:staff');
            Route::post('/update/{id?}', 'postUpdateColor')->name('color.postUpdateColor')->middleware('role.level:staff');

            Route::delete('delete/{id?}', 'deleteColor')->name('color.deleteColor')->middleware('role.level:staff');
        });
    });

    Route::group(['prefix' => 'products'], function () {
        Route::controller(ProductController::class)->group(function () {
            Route::get('/', 'getListProduct')->name('products.getListProduct')->middleware('role.level:staff');

            Route::get('/create-products', 'getCreateProduct')->name('products.getCreateProduct')->middleware('role.level:staff');
            Route::post('/create', 'postAddProduct')->name('products.postAddProduct')->middleware('role.level:staff');

            Route::get('/update-products/{id?}', 'getUpdateProduct')->name('products.getUpdateProduct')->middleware('role.level:staff');
            Route::post('/update/{id?}', 'postUpdateProduct')->name('product.postUpdateProduct')->middleware('role.level:staff');

            Route::delete('delete/{id?}', 'deleteProduct')->name('products.deleteProduct')->middleware('role.level:staff');
            Route::delete('delete-image/{id?}', 'deleteProductImage')->name('products.deleteProductImage')->middleware('role.level:staff');

            Route::post('/update-color-image/{id?}', 'postUpdateColorImage')->name('products.postUpdateColorImage')->middleware('role.level:staff');
            Route::put('/update-color-weight/{id?}', 'postUpdateColorWeight')->name('products.postUpdateColorWeight')->middleware('role.level:staff');


            Route::delete('/delete-price-sale/{id?}', 'deletePriceSale')->name('products.deletePriceSale');
        });
    });

    Route::group(['prefix' => 'catagory-news'], function () {
        Route::controller(CategoryNewsController::class)->group(function () {
            Route::get('/', 'getListCategoryNews')->name('catagoryNews.getListCategoryNews')->middleware('role.level:staff');

            Route::get('/create-catagory', 'getCreateCategoryNews')->name('catagoryNews.getCreateCategoryNews')->middleware('role.level:staff');
            Route::post('/create', 'postAddCategoryNews')->name('catagoryNews.postAddCategoryNews')->middleware('role.level:staff');

            Route::get('/update-category/{id?}', 'getUpdateCategoryNews')->name('catagoryNews.getUpdateCategoryNews')->middleware('role.level:staff');
            Route::post('/update/{id?}', 'postUpdateCategoryNews')->name('catagoryNews.postUpdateCategoryNews')->middleware('role.level:staff');

            Route::delete('delete/{id?}', 'deleteCategoryNews')->name('catagoryNews.deleteCategoryNews')->middleware('role.level:staff');

        });
    });

    Route::group(['prefix' => 'news'], function () {
        Route::controller(NewsController::class)->group(function () {
            Route::get('/', 'getListNews')->name('news.getListNews')->middleware('role.level:staff');

            Route::get('/create-news', 'getCreateNews')->name('news.getCreateNews')->middleware('role.level:staff');
            Route::post('/create', 'postAddNews')->name('news.postAddNews')->middleware('role.level:staff');

            Route::get('/update-news/{id?}', 'getUpdateNews')->name('news.getUpdateNews')->middleware('role.level:staff');
            Route::post('/update/{id?}', 'postUpdateNews')->name('news.postUpdateNews')->middleware('role.level:staff');

            Route::delete('delete/{id?}', 'deleteNews')->name('news.deleteNews')->middleware('role.level:staff');

        });
    });

    Route::group(['prefix' => 'partner'], function () {
        Route::controller(PartnerController::class)->group(function () {
            Route::get('/', 'getListPartner')->name('partner.getListPartner')->middleware('role.level:staff');

            Route::get('/create-partner', 'getCreatePartner')->name('partner.getCreatePartner')->middleware('role.level:staff');
            Route::post('/create', 'postAddPartner')->name('partner.postAddPartner')->middleware('role.level:staff');

            Route::get('/update-partner/{id?}', 'getUpdatePartner')->name('partner.getUpdatePartner')->middleware('role.level:staff');
            Route::post('/update/{id?}', 'postUpdatePartner')->name('partner.postUpdatePartner')->middleware('role.level:staff');

            Route::delete('delete/{id?}', 'deletePartner')->name('partner.deletePartner')->middleware('role.level:staff');

        });
    });


    Route::group(['prefix' => 'page'], function () {
        Route::controller(PageController::class)->group(function () {
            Route::get('/', 'getListPage')->name('page.getListPage')->middleware('role.level:staff');

            Route::get('/create-page', 'getCreatePage')->name('page.getCreatePage')->middleware('role.level:staff');
            Route::post('/create', 'postAddPage')->name('page.postAddPage')->middleware('role.level:staff');

            Route::get('/update-page/{id?}', 'getUpdatePage')->name('page.getUpdatePage')->middleware('role.level:staff');
            Route::post('/update/{id?}', 'postUpdatePage')->name('page.postUpdatePage')->middleware('role.level:staff');

            Route::delete('delete/{id?}', 'deletePage')->name('page.deletePage')->middleware('role.level:staff');

        });
    });

    Route::group(['prefix' => 'setting'], function () {
        Route::controller(SettingController::class)->group(function () {
            Route::get('/', 'getListSetting')->name('setting.getListSetting')->middleware('role.level:staff');
            Route::post('/update-setting', 'postUpdateSetting')->name('setting.postUpdateSetting')->middleware('role.level:staff');
        });
    });

    Route::controller(DashboardController::class)->group(function () {
        Route::post('/public/upload', 'uploadImage')->name('upload.uploadImage');
        Route::put('/update-ship/{id?}', 'updateShipProduct')->name('update.updateShipProduct');

    });


    Route::group(['prefix' => 'contact'], function () {
        Route::controller(ContactController::class)->group(function () {
            Route::get('/', 'getListContact')->name('contact.getListContact')->middleware('role.level:staff');
            Route::get('/create-contact', 'getCreateContact')->name('contact.getCreateContact')->middleware('role.level:staff');
            Route::post('/add-contact', 'postCreateContact')->name('contact.postCreateContact')->middleware('role.level:staff');

            Route::get('/update-contact/{id?}', 'getUpdateContact')->name('contact.getUpdateContact')->middleware('role.level:staff');
            Route::post('/update-contact/{id?}', 'postUpdateContact')->name('contact.postUpdateContact')->middleware('role.level:staff');

            Route::delete('/delete-contact/{id?}', 'deleteContact')->name('contact.deleteContact')->middleware('role.level:staff');
        });
    });

    

    Route::get('/migrate', function(){
        Artisan::call('migrate:fresh --seed');
        return  "ok";
    });
    
});
