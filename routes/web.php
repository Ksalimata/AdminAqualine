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

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/log', function () {
    return redirect('/logins');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');

    //Users
    Route::resource('user', 'UserController');

    //Client
    Route::resource('client', 'ClientController');

    //Gare
    Route::resource('gare', 'GareController');

    //Bateau
    Route::resource('bateau', 'BateauController');

    //Passage
    Route::get('passage','PassageController@index');

    //Operation
    Route::get('operation','OperationController@index');
    Route::get('rechargement/{client_id}','OperationController@rechargement');
    Route::put('recharger/{client_id}','OperationController@recharger')->name('recharger');

    Route::get('statistiques','HomeController@getStatistique');
});

