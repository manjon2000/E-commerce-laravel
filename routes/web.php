<?php

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

//Engloba las routas para que funcionen con traducciones estaticas
Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    //***************RUTAS DEL FRONTEND*****************
    //**************************************************
    Route::get('/', function () {
        return view('welcome');
    });

    //***************RUTAS DEL BACKEND******************
    //**************************************************

    //Genera las rutas de autenticacion login, register, logout...
    Auth::routes();
    //protege las rutas de dentro
    Route::group(['middleware' => ['auth']], function () {

        //Ruta del dashboard
        Route::get('/home', 'HomeController@index')->name('home');
        Route::middleware(['can:is_admin'])->group(function () {
            //Ruta de categorias en admin
            Route::resource('categories', CategoriesController::class);

            //Ruta de Usuarios admin
            Route::resource('profiles', UsersController::class);
            //Ruta de productos
            Route::resource('products', 'ProductsController');
            Route::get('/images/{image}/edit', 'ProductsController@updateimagesindex')->name('updateimageindex');
            Route::put('/images/{image}', 'ProductsController@updateimages')->name('updateimage');
            //ruta sizes en admin
            Route::resource('sizes', SizesController::class);
            Route::resource('inventories', InventoriesController::class);

            // Ruta de store en admin
            Route::resource('stores', StoresController::class);

        });

        //ruta per usuari no admin
        Route::get('profile', "UsersController@profile");

        
        //Ruta de productos
        Route::get('/images/create/{id}', 'Controller@createimagesindex')->name('createimageindex');
        Route::post('/images2', 'Controller@createimages')->name('createimage');
        //ruta sizes en admin
        Route::post('/imageschanges', 'Controller@updateimage')->name('updateimage');

    });

    //******************UTILES********************* */

    Route::get('/cities/{country}', 'ToolsController@cities')->name('tools.cities');

});
