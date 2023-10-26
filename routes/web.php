<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { return view('frontend.index'); })->name('home');
Route::get('forbidden', function () { return view('error.forbidden'); })->name('forbidden');
Route::get('/dashboard', function () {  $user = auth()->user();
    return view($user->user_type === 1 ? 'admin.index' : ($user->user_type === 2 ? 'frontend.index' : 'welcome')); })->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth', 'check_user:1'], 'as' => 'admin.'], function () {
    Route::resource('blank-page', \App\Http\Controllers\BasicController::class);
    Route::resource('profile', \App\Http\Controllers\ProfileController::class);
    Route::resource('setting', \App\Http\Controllers\SettingController::class);
});

Route::group(['middleware' => ['auth', 'check_user:2'], 'prefix'=>'user', 'as' => 'user.'], function () {  
    
    Route::resource('profile', \App\Http\Controllers\frontend\ProfileController::class);


});
    



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
