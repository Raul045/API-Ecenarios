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
Route::view('/', 'welcome')->name('welcome')->middleware('guest');
Route::view('/verified', 'Verificacion');
Route::view('/Dashboard', 'home')->middleware('auth')->name('home');
// Route::view('/Dashboard', 'home')->middleware(checklogin::class);
Route::view('/No encontrado', 'Not-found');
Route::view('/Codigo null', 'code-not');


// Route::post('welcome', function(){
//     $credenciales = request()->only('email', 'password');

//     if (Auth::attempt($credenciales)){
//         return 'estas logueado';
//     }
//     return view('/sin-registro');
// });

Auth::routes();

Route::post('/', 'UserController@Returnwelcome');
Route::post('/verified', 'UserController@Returnverified');

Route::post('/Registro', 'UserController@AgregarUser')->name('Registro');
Route::post('/Login', 'UserController@LoginUser', function(){
    console.log(request);
});

Route::get('/perfil', 'UserController@indexper')->name('Perfil')->middleware();
Route::post('/verificacion', 'UserController@VerifiedCode');
//Rutas protegidas
Route::post('/LogOut','UserController@logoutUser')->name('LogOut');

