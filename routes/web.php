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
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    $this->get('/', 'HomeController@index')->name('admin.home');

    //tela de exibição de associações
    $this->get('/mapa', 'HomeController@map')->name('admin.mapa');
    
    //Tela de cadastro
    $this->get('/add/usuario', 'HomeController@adduser')->name('admin.adduser');
    $this->post('/add/usuario', 'HomeController@adduserpost')->name('admin.adduser.post');
    $this->get('/add/comprador', 'HomeController@addcomprador')->name('admin.addcomprador');
    $this->post('/add/comprador', 'HomeController@addcompradorpost')->name('admin.addcomprador.post');
});
