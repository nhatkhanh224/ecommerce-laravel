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

Route::get('/', [
    'as' => 'admin.login',
    'uses' => 'AdminController@loginAdmin'
]);
Route::post('/', [
    'as' => 'admin.post-login',
    'uses' => 'AdminController@postLoginAdmin'
]);

Route::get('/logout', [
    'as' => 'admin.logout',
    'uses' => 'AdminController@logout'
]);

Route::get('/home', function () {
    return view('home');
})->middleware('checklogin::class');;
    
Route::prefix('admin')->group(function () {
    //Category
    
    //Menu
    Route::prefix('menus')->group(function () {
        Route::get('/',[
            'as'=>'menus.index',
            'uses'=>'MenuController@index',
            
        ] );
        Route::get('/create',[
            'as'=>'menus.create',
            'uses'=>'MenuController@create'
        ] );
        Route::post('/store', [
            'as' => 'menus.store',
            'uses' => 'MenuController@store'
        ]);
        Route::get('/edit/{id}',[
            'as'=>'menus.edit',
            'uses'=>'MenuController@edit'
        ] );
        Route::post('/update/{id}', [
            'as' => 'menus.update',
            'uses' => 'MenuController@update'
        ]);
        Route::get('/delete/{id}',[
            'as'=>'menus.delete',
            'uses'=>'MenuController@delete'
        ] );
    });
    //Product
    
    Route::prefix('slider')->group(function () {
        Route::get('/',[
            'as'=>'slider.index',
            'uses'=>'AdminSliderController@index',
        ] );
        Route::get('/create',[
            'as'=>'slider.create',
            'uses'=>'AdminSliderController@create'
        ] );
        Route::post('/store',[
            'as'=>'slider.store',
            'uses'=>'AdminSliderController@store'
        ] );
        Route::get('/edit/{id}',[
            'as'=>'slider.edit',
            'uses'=>'AdminSliderController@edit'
        ] );
        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses' => 'AdminSliderController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'slider.delete',
            'uses' => 'AdminSliderController@delete'
        ]);
        
    });
    Route::prefix('settings')->group(function () {
        Route::get('/',[
            'as'=>'settings.index',
            'uses'=>'AdminSettingController@index'
        ] );
        Route::get('/create',[
            'as'=>'settings.create',
            'uses'=>'AdminSettingController@create'
        ] );
        Route::post('/store', [
            'as' => 'settings.store',
            'uses' => 'AdminSettingController@store'
        ]);
        Route::get('/edit/{id}',[
            'as'=>'settings.edit',
            'uses'=>'AdminSettingController@edit'
        ] );
        Route::post('/update/{id}', [
            'as' => 'settings.update',
            'uses' => 'AdminSettingController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'settings.delete',
            'uses' => 'AdminSettingController@delete'
        ]);
        
    });
    Route::prefix('users')->group(function () {
        Route::get('/',[
            'as'=>'users.index',
            'uses'=>'AdminUserController@index'
        ]);
        Route::get('/create',[
            'as'=>'users.create',
            'uses'=>'AdminUserController@create'
        ]);
        Route::post('/store',[
            'as'=>'users.store',
            'uses'=>'AdminUserController@store'
        ]);
        Route::get('/edit/{id}',[
            'as'=>'users.edit',
            'uses'=>'AdminUserController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'users.update',
            'uses' => 'AdminUserController@update'
        ]);
        Route::get('/delete/{id}',[
            'as'=>'users.delete',
            'uses'=>'AdminUserController@delete'
        ]);
    });
    Route::prefix('roles')->group(function () {
        Route::get('/',[
            'as'=>'roles.index',
            'uses'=>'AdminRoleController@index'
        ]);
        Route::get('/create',[
            'as'=>'roles.create',
            'uses'=>'AdminRoleController@create'
        ]);
        Route::post('/store',[
            'as'=>'roles.store',
            'uses'=>'AdminRoleController@store'
        ]);
        Route::get('/edit/{id}',[
            'as'=>'roles.edit',
            'uses'=>'AdminRoleController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'roles.update',
            'uses' => 'AdminRoleController@update'
        ]);
    });
    Route::prefix('permissions')->group(function () {
        Route::get('/create',[
            'as'=>'permissions.create',
            'uses'=>'AdminPermissionController@create'
        ]);
        Route::post('/store',[
            'as'=>'permissions.store',
            'uses'=>'AdminPermissionController@store'
        ]);
        
    });
    Route::prefix('orders')->group(function () {
        Route::get('/',[
            'as'=>'orders.index',
            'uses'=>'OrderController@index'
        ]);
        Route::get('/show/{id}',[
            'as'=>'orders.show',
            'uses'=>'OrderController@show'
        ]);
        Route::get('/delete/{id}',[
            'as'=>'orders.delete',
            'uses'=>'OrderController@delete'
        ]);
        Route::get('/update-status/{id}',[
            'as'=>'orders.update-status',
            'uses'=>'OrderController@updateStatus'
        ]);
    });
});

Route::prefix('homepage')->group(function () {
        Route::get('/',[
            'as'=>'homepage.index',
            'uses'=>'HomeController@index'
        ]);
        Route::get('/login',[
            'as'=>'homepage.login',
            'uses'=>'HomeController@login'
        ]);
        Route::post('/login',[
            'as'=>'homepage.loginPost',
            'uses'=>'HomeController@loginPost'
        ]);
        Route::post('/signup',[
            'as'=>'homepage.signup',
            'uses'=>'HomeController@signup'
        ]);
        Route::get('/logout',[
            'as'=>'homepage.logout',
            'uses'=>'HomeController@logout'
        ]);
        Route::get('/category/{slug}/{id}',[
            'as'=>'category.product',
            'uses'=>'HomeController@category'
        ]);
        Route::get('/product/{id}',[
            'as'=>'product.detail',
            'uses'=>'HomeController@productDetail'
        ]);
        Route::post('product/add-to-cart/{id}',[
            'as'=>'addToCart',
            'uses'=>'HomeController@addToCart'
        ]);
        Route::get('cart',[
            'as'=>'cart',
            'uses'=>'HomeController@showCart'
        ]);
        // Route::get('cart/update/{quantity}/{id}',[
        //     'as'=>'cart.update',
        //     'uses'=>'HomeController@updateCart'
        // ]);
        Route::get('cart/update/{id}/{quantity}',[
            'as'=>'cart.update',
            'uses'=>'HomeController@updateQuantity'
        ]);
        Route::get('cart/delete/{id}',[
            'as'=>'cart.delete',
            'uses'=>'HomeController@deleteCart'
        ]);
        Route::post('checkout',[
            'as'=>'checkout',
            'uses'=>'HomeController@checkout'
        ]);
        Route::post('search',[
            'as'=>'search',
            'uses'=>'HomeController@search'
        ]);
        Route::get('order/history',[
            'as'=>'order.history',
            'uses'=>'HomeController@historyOrder'
        ]);
        Route::get('order/view/{id}',[
            'as'=>'order.view',
            'uses'=>'HomeController@viewOrder'
        ]);
        Route::post('comment',[
            'as'=>'comment',
            'uses'=>'HomeController@comment'
        ]);
        Route::get('user',[
            'as'=>'homepage.user',
            'uses'=>'HomeController@user'
        ]);
        Route::post('user/update',[
            'as'=>'homepage.userUpdate',
            'uses'=>'HomeController@userUpdate'
        ]);
    });