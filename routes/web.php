<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Like; 
use App\Models\Category; // Import the Blog model
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('frontend.index');
})->name('home');
Route::get('forbidden', function () {
    return view('error.forbidden');
})->name('forbidden');
Route::get('/dashboard', function () {
    $user = auth()->user();
    return view($user->user_type === 1 ? 'admin.index' : ($user->user_type === 2 ? 'frontend.index' : 'welcome'));
})->middleware(['auth', 'verified'])->name('dashboard');

// route for like
Route::post('/like', [App\Http\Controllers\frontend\likeController::class, 'store'])->middleware(['auth', 'verified'])->name('like.store');
Route::get('/get-like-count/{blogId}', function ($blogId) {
    $userId = optional(Auth::user())->id;

    $likeCount = Like::where('blog_id', $blogId)->count();
    $userLiked = $userId ? Like::where('blog_id', $blogId)->where('user_id', $userId)->exists() : null;

    return response()->json(['like_count' => $likeCount, 'user_liked' => $userLiked]);
});

// route for get category
Route::get('/load-more-categories', function () {
    $page = request('page');
    $perPage = 5; // Number of categories per page
    $skip = ($page - 1) * $perPage;

    $categories = Category::skip($skip)->take($perPage)->get();

    // Create an array to hold categories with count information
    $categoriesWithCount = [];

    foreach ($categories as $category) {
        $countBlog = App\Models\Blog::where('category_id', $category->id)->count();
        $categoriesWithCount[] = [
            'id' => $category->id,
            'name' => $category->name,
            'count' => $countBlog,
        ];
    }

    // Return the categories with count as JSON
    return response()->json(['categories' => $categoriesWithCount]);
});




Route::group(['middleware' => ['auth', 'check_user:1'], 'as' => 'admin.'], function () {
    Route::resource('blank-page', \App\Http\Controllers\BasicController::class);
    Route::resource('profile', \App\Http\Controllers\ProfileController::class);
    Route::resource('setting', \App\Http\Controllers\SettingController::class);
    Route::resource('blog', \App\Http\Controllers\backend\BlogController::class);
    Route::post('blog_ckeditor',[\App\Http\Controllers\backend\BlogController::class ,'ckeditor'])->name('blog.ckeditor');
    Route::post('blog_remove_image', [\App\Http\Controllers\backend\BlogController::class, 'removeImage'])->name('blog.removeImage');

});

Route::group(['middleware' => ['auth', 'check_user:2'], 'prefix' => 'user', 'as' => 'user.'], function () {

    Route::resource('profile', \App\Http\Controllers\frontend\ProfileController::class);
    Route::resource('blog', \App\Http\Controllers\frontend\BlogController::class)->only('show')->withoutMiddleware(['auth', 'check_user:2']);

});




// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
