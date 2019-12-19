<?php

Route::get('/', [
    'uses'  =>  'NewShopController@index',
    'as'    =>  '/'
]);

Route::get('/category-product/{id}', [
    'uses'  =>  'NewShopController@categoryProduct',
    'as'    =>  'category-product'
]);
Route::get('/product-details/{id}/{name}', [
    'uses'  =>  'NewShopController@productDetails',
    'as'    =>  'product-details'
]);


Route::get('/product/delete/{id}', [
    'uses'  =>  'ProductController@deleteProductinfo',
    'as'    =>  'delete-product'
]);






















Route::get('/category/add', [
    'uses'  =>  'CategoryController@index',
    'as'    =>  'add-category'
]);
Route::post('/category/save', [
    'uses'  =>  'CategoryController@saveCategoryInfo',
    'as'    =>  'new-category'
]);

Route::get('/category/manage', [
    'uses'  =>  'CategoryController@manageCategoryInfo',
    'as'    =>  'manage-category'
]);
Route::get('/category/unpublished/{id}', [
    'uses'  =>  'CategoryController@unpublishedCategoryInfo',
    'as'    =>  'unpublished-category'
]);

Route::get('/category/published/{id}', [
    'uses'  =>  'CategoryController@publishedCategoryInfo',
    'as'    =>  'published-category'
]);
Route::get('/category/edit/{id}', [
    'uses'  =>  'CategoryController@editCategoryInfo',
    'as'    =>  'edit-category'
]);

Route::post('/category/update', [
    'uses'  =>  'CategoryController@updateCategoryInfo',
    'as'    =>  'update-category'
]);
Route::get('/category/delete/{id}', [
    'uses'  =>  'CategoryController@deleteCategoryInfo',
    'as'    =>  'delete-category'
]);









Route::get('/brand/add', [
    'uses'  =>  'BrandController@index',
    'as'    =>  'add-brand'
]);

Route::post('/brand/save', [
    'uses'  =>  'BrandController@saveBrand',
    'as'    =>  'new-brand'
]);
Route::get('/brand/manage', [
    'uses'  =>  'BrandController@managebrandInfo',
    'as'    =>  'manage-brand'
]);
Route::get('/brand/unpublished/{id}', [
    'uses'  =>  'BrandController@unpublishedBrandInfo',
    'as'    =>  'unpublished-brand'
]);
Route::get('/brand/published/{id}', [
    'uses'  =>  'BrandController@publishedBrandInfo',
    'as'    =>  'published-brand'
]);

Route::get('/brand/edit/{id}', [
    'uses'  =>  'BrandController@editBrandInfo',
    'as'    =>  'edit-brand'
]);
Route::post('/brand/update', [
    'uses'  =>  'BrandController@updateBrandInfo',
    'as'    =>  'update-brand'
]);
Route::get('/brand/delete/{id}', [
    'uses'  =>  'BrandController@deleteBrandInfo',
    'as'    =>  'delete-brand'
]);









Route::get('/product/add', [
    'uses'  =>  'ProductController@index',
    'as'    =>  'add-product'
]);
route::post('/product/save',[
    'uses'  => 'ProductController@saveProduct',
    'as'    => 'new-product'
]);

route::get('/product/manage',[
    'uses'  => 'ProductController@manageProduct',
    'as'    => 'manage-product'
]);







Route::get('/product/edit/{id}', [
    'uses'  =>  'ProductController@editProduct',
    'as'    =>  'edit-product'
]);

Route::post('/product/update', [
    'uses'  =>  'ProductController@updateProduct',
    'as'    =>  'update-product'
]);




Route::post('/cart/add', [
    'uses'  =>  'CartController@addToCart',
    'as'    =>  'add-to-cart'
]);

Route::get('/cart/show', [
    'uses'  =>  'CartController@showCart',
    'as'    =>  'show-cart'
]);

Route::get('/cart/delete/{id}', [
    'uses'  =>  'CartController@deleteCart',
    'as'    =>  'delete-cart-item'
]);
Route::post('/cart/update', [
    'uses'  =>  'CartController@updateCart',
    'as'    =>  'update-cart'
]);
Route::get('/checkout', [
    'uses'  =>  'CheckoutController@index',
    'as'    =>  'checkout'
]);

Route::post('/customer/registration', [
    'uses'  =>  'CheckoutController@customerSignUp',
    'as'    =>  'customer-sign-up'
]);
Route::get('/checkout/shipping', [
    'uses'  =>  'CheckoutController@shippingForm',
    'as'    =>  'checkout-shipping'
]);

Route::post('/shipping/save', [
    'uses'  =>  'CheckoutController@saveShippingInfo',
    'as'    =>  'new-shipping'
]);

Route::get('/checkout/payment', [
    'uses'  =>  'CheckoutController@paymentForm',
    'as'    =>  'checkout-payment'
]);










Route::post('/checkout/order', [
    'uses'  =>  'CheckoutController@newOrder',
    'as'    =>  'new-order'
]);

Route::get('/complete/order', [
    'uses'  =>  'CheckoutController@completeOrder',
    'as'    =>  'complete-order'
]);





Route::post('/checkout/customer-login', [
    'uses'  =>  'CheckoutController@customerLoginCheck',
    'as'    =>  'customer-login'
]);

Route::post('/checkout/customer-logout', [
    'uses'  =>  'CheckoutController@customerLogout',
    'as'    =>  'customer-logout'
]);



Route::get('/checkout/new-customer-login', [
    'uses'  =>  'CheckoutController@newCustomerLogin',
    'as'    =>  'new-customer-login'
]);


















Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
