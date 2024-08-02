<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoctelesController;
use App\Http\Controllers\APIController;
Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/cocteles', function () {
//     return view('cocteles.index');
// });


// Route::get('/cocteles/create',[CoctelesController::class,'create']);
Route::resource('cocteles',CoctelesController::class)->middleware('auth');

Auth::routes(['reset'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware'=> 'auth'], function (){
    Route::get('/',[ CoctelesController::class, 'index'])->name ('home');
});

Route::resource('api',APIController::class)->middleware('auth');
Route::get('/cocteles/{id}', [APIController::class, 'show'])->name('cocteles.show');

Route::get('/cocteles/export/{id}', [APIController::class, 'export'])->name('cocteles.export');
Route::post('/cocteles/export/{idDrink}', [APIController::class, 'export'])->name('cocteles.export');
