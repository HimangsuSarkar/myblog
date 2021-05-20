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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', function () {
    return view('frontend.website.home');
})->name('website');
Route::get('/about', function () {
    return view('frontend.website.about');
});
Route::get('/category', function () {
    return view('frontend.website.category');
});

Route::get('/contacts', function () {
    return view('frontend.website.contacts');
});

Route::get('/post', function () {
    return view('frontend.website.post');
});

//admin panel

Route::group(['prefix'=>'admin','middleware'=>['auth']],function (){
    Route::get('/dashboard', function () {
        return view('backend.dashboard.index');
    });

Route::resource('category',\App\Http\Controllers\CategoryController::class);
});


