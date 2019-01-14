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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::auth();


Route::get('/', 'HomeController@index')->name('frontendExample');


/* ----------------BACKEND-------------------*/

// DASHBOARD
Route::get('/dashboard','DashboardController@index')->name('dashboard');

// PRODUK
Route::get('/manageproduct/data','ProductController@dataproduk')->name('product');
Route::post('/manageproduct/data/prosescreate','ProductController@tambah');
Route::get('/manageproduct/data/update/{id}','ProductController@tampilubah');
Route::post('/manageproduct/data/prosesupdate/{id}','ProductController@ubah');
Route::get('/manageproduct/data/delete/{id}','ProductController@delete');

// CATEGORY
Route::get('/managecategory/data','CategoryController@datakategori')-> name('category');
Route::post('/managecategory/data/prosescreate','CategoryController@tambah');
Route::get('/managecategory/data/update/{id}','CategoryController@tampilupdate');
Route::post('/managecategory/data/prosesupdate/{id}','CategoryController@update');
Route::get('/managecategory/data/delete/{id}','CategoryController@delete');

// MIX AND MATCH
Route::get('/managemixandmatch/data','MixAndMatchController@datamixandmatch')-> name('mixandmatch');
Route::post('/managemixandmatch/data/prosescreate','MixAndMatchController@tambah');
Route::get('/managemixandmatch/data/update/{id}','MixAndMatchController@tampilupdate');
Route::post('/managemixandmatch/data/prosesupdate/{id}','MixAndMatchController@update');
Route::get('/managemixandmatch/data/delete/{id}','MixAndMatchController@delete');
Route::get('/managemixandmatch/data/view/{id}','MixAndMatchController@viewMM');

// CUSTOMER
Route::get('/managecustomer/data','CustomerController@datacustomer')-> name('customer');

// ONGKIR
Route::get('/manageongkir/data','OngkirController@dataongkir')->name('ongkir');
Route::post('/manageongkir/data/prosescreate','OngkirController@tambah');
Route::get('/manageongkir/data/update/{id}','OngkirController@tampilupdate');
Route::post('/manageongkir/data/prosesupdate/{id}','OngkirController@update');
Route::get('/manageongkir/data/delete/{id}','OngkirController@delete');

/* ----------------FRONTEND-------------------*/

// HOME
Route::get('/index', 'HomeController@index')->name('home');

// MIX AND MATCH
Route::get('/mixmatch/data','MixMatchFrontendController@datamixmatch')-> name('mixandmatchfrontend');
Route::get('/mixmatch/data/option/{id}','MixMatchFrontendController@datamixmatch');

// ATASAN
Route::get('atasan/data','ProductFrontendController@produkatasan')-> name('produkatasan');

// BAWAHAN
Route::get('bawahan/data','ProductFrontendController@produkbawahan')-> name('produkbawahan');

// GAMIS
Route::get('gamis/data','ProductFrontendController@produkgamis')-> name('produkgamis');

// KERUDUNG
Route::get('kerudung/data','ProductFrontendController@produkkerudung')-> name('produkkerudung');