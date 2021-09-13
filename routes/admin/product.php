<?php
Route::prefix('products')->group(function () {
  Route::get('/',[
      'as'=>'products.index',
      'uses'=>'AdminProductController@index',
      
  ] );
  Route::get('/create',[
      'as'=>'products.create',
      'uses'=>'AdminProductController@create'
  ] );
  Route::post('/store',[
      'as'=>'products.store',
      'uses'=>'AdminProductController@store'
  ] );
  Route::get('/edit/{id}',[
      'as'=>'products.edit',
      'uses'=>'AdminProductController@edit',
  ] );
  Route::post('/update/{id}', [
      'as' => 'products.update',
      'uses' => 'AdminProductController@update'
  ]);
  Route::get('/delete/{id}', [
      'as' => 'products.delete',
      'uses' => 'AdminProductController@delete'
  ]);
});