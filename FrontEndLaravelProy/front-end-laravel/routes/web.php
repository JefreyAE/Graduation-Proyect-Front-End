<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\FrontAuthMiddleware;


Route::get('/login', function () {
    return view('users.userLogin');
});

Route::get('/redirect','UserController@redirect')->name('animals.register');
Route::post('/user/register/','UserController@register')->name('user.register');
Route::get('/user/logout/','UserController@logout')->name('user.logout');

Route::get('/', function () {
    return view('users.userLogin');
});

Route::post('/user/login','UserController@login')->name('login');
Route::get('/user/profile','UserController@profile')->name('user.profile')->middleware(FrontAuthMiddleware::class);
Route::post('/user/update','UserController@update')->name('user.update')->middleware(FrontAuthMiddleware::class);
Route::get('/main/index/{token?}','MainController@index')->middleware(FrontAuthMiddleware::class)->name('main.index');

Route::get('/animals/index/{type?}','AnimalController@index')->name('animals.index')->middleware(FrontAuthMiddleware::class);
Route::get('/animals/dead/{type?}','AnimalController@dead')->name('animals.dead')->middleware(FrontAuthMiddleware::class);
Route::get('/animals/indexAll/{type?}','AnimalController@indexAll')->name('animals.indexAll')->middleware(FrontAuthMiddleware::class);
Route::get('/animals/register/','AnimalController@register')->name('animals.register')->middleware(FrontAuthMiddleware::class);
Route::post('/animals/create/','AnimalController@create')->name('animals.create')->middleware(FrontAuthMiddleware::class);
Route::post('/animals/find/','AnimalController@find')->name('animals.find')->middleware(FrontAuthMiddleware::class);
Route::get('/animals/detail/{id?}/{message?}','AnimalController@detail')->name('animals.detail')->middleware(FrontAuthMiddleware::class);
Route::get('/animals/offsprings/{id?}','AnimalController@offsprings')->name('animals.offsprings')->middleware(FrontAuthMiddleware::class);
Route::get('/animals/search/','AnimalController@search')->name('animals.search')->middleware(FrontAuthMiddleware::class);
Route::post('/animals/image-upload/','AnimalController@uploadImage')->name('animals.uploadImage')->middleware(FrontAuthMiddleware::class);
Route::get('/animals/image-delete/{image_name}/{animal_id}','AnimalController@deleteImage')->name('animals.deleteImage')->middleware(FrontAuthMiddleware::class);
Route::post('/animals/update/','AnimalController@update')->name('animals.update')->middleware(FrontAuthMiddleware::class);
Route::get('/animals/delete/{id}','AnimalController@delete')->name('animals.delete')->middleware(FrontAuthMiddleware::class);

Route::get('/injectables/register/{token?}','InjectableController@register')->name('injectables.register')->middleware(FrontAuthMiddleware::class);
Route::post('/injectables/create/{token?}','InjectableController@create')->name('injectables.create')->middleware(FrontAuthMiddleware::class);
Route::get('/injectables/index/{token?}','InjectableController@index')->name('injectables.index')->middleware(FrontAuthMiddleware::class);
Route::get('/injectables/injectable/detail/{creation_time?}','InjectableController@detail')->name('injectables.detail')->middleware(FrontAuthMiddleware::class);
Route::get('/injectables/injectable/delete-one/{creation_time}/{animal_id}','InjectableController@deleteOne')->name('injectables.deleteOne')->middleware(FrontAuthMiddleware::class);

Route::get('/incidents/index/{token?}','IncidentController@index')->name('incidents.index')->middleware(FrontAuthMiddleware::class);
Route::get('/incidents/register/{token?}','IncidentController@register')->name('incidents.register')->middleware(FrontAuthMiddleware::class);
Route::post('/incidents/create/{token?}','IncidentController@create')->name('incidents.create')->middleware(FrontAuthMiddleware::class);
Route::get('/incidents/incident/delete-one/{incident_id}/{animal_id}/{incidentsList?}','IncidentController@deleteOne')->name('incidents.deleteOne')->middleware(FrontAuthMiddleware::class);

Route::get('/sales/index/{token?}','SaleController@index')->name('sales.index')->middleware(FrontAuthMiddleware::class);
Route::get('/sales/register/{token?}','SaleController@register')->name('sales.register')->middleware(FrontAuthMiddleware::class);
Route::post('/sales/create/{token?}','SaleController@create')->name('sales.create')->middleware(FrontAuthMiddleware::class);
Route::get('/sales/search/','SaleController@search')->name('sales.search')->middleware(FrontAuthMiddleware::class);
Route::post('/sales/find/','SaleController@find')->name('sales.find')->middleware(FrontAuthMiddleware::class);
Route::get('/sales/sale/delete-one/{sale_id}/{animal_id}','SaleController@deleteOne')->name('sales.deleteOne')->middleware(FrontAuthMiddleware::class);
Route::get('/sales/sale/detail/{animal_id?}/{name?}/{sale_type?}/{sale_date?}/{weight?}/{price_total?}/{price_kg?}/{auction_commision?}/{sex?}/','SaleController@detail')->name('sales.detail')->middleware(FrontAuthMiddleware::class);

Route::get('/purchases/index/{token?}','PurchaseController@index')->name('purchases.index')->middleware(FrontAuthMiddleware::class);
Route::get('/purchases/register/{token?}','PurchaseController@register')->name('purchases.register')->middleware(FrontAuthMiddleware::class);
Route::post('/purchases/create/{token?}','PurchaseController@create')->name('purchases.create')->middleware(FrontAuthMiddleware::class);
Route::get('/purchases/search/','PurchaseController@search')->name('purchases.search')->middleware(FrontAuthMiddleware::class);
Route::post('/purchases/find/','PurchaseController@find')->name('purchases.find')->middleware(FrontAuthMiddleware::class);
Route::get('/purchases/purchase/delete-one/{purchase_id}/{animal_id}','PurchaseController@deleteOne')->name('purchases.deleteOne')->middleware(FrontAuthMiddleware::class);
Route::get('/purchases/purchase/detail/{animal_id?}/{name?}/{purchase_type?}/{purchase_date?}/{weight?}/{price_total?}/{price_kg?}/{auction_commision?}/{sex?}/{description?}','PurchaseController@detail')->name('purchases.detail')->middleware(FrontAuthMiddleware::class);

Route::get('/notifications/index/{type?}','NotificationController@index')->name('notifications.index')->middleware(FrontAuthMiddleware::class);
Route::get('/notifications/generate/','NotificationController@generate')->name('notifications.generate')->middleware(FrontAuthMiddleware::class);
Route::get('/notifications/indexAll/{type?}','NotificationController@indexAll')->name('notifications.indexAll')->middleware(FrontAuthMiddleware::class);
Route::get('/notifications/checked/{type?}','NotificationController@checked')->name('notifications.checked')->middleware(FrontAuthMiddleware::class);
Route::get('/notifications/state/{id}','NotificationController@state')->name('notifications.state')->middleware(FrontAuthMiddleware::class);

Route::get('/statistics/index/','StatisticsController@index')->name('statistics.index')->middleware(FrontAuthMiddleware::class);
Route::get('/statistics/auctions/','StatisticsController@auctions')->name('statistics.auctions')->middleware(FrontAuthMiddleware::class);

Route::get('/errors/pageNotFound/','ErrorController@pageNotFound')->name('errors.errorPage404')->middleware(FrontAuthMiddleware::class);