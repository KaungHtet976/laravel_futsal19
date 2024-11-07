<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPlayerController;
use App\Http\Controllers\AdminTeamController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminVideoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;



Route::get('/',[HomeController::class, 'index']);

// guest routes
Route::get('/register',[AuthController::class,'create'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');
Route::get('/login',[AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class, 'post_login'])->middleware('guest');




//player public route
Route::get('/players', [PlayerController::class, 'index'])->name('players.index');
Route::get('/players/{id}', [PlayerController::class, 'show'])->name('players.show');

//blog public route
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');

//Video public route
Route::get('videos',[VideoController::class, 'index'])->name('videos.index');
Route::get('videos/{id}',[VideoController::class,'show'])->name('videos.show');
Route::get('videos/{id}/download', [VideoController::class, 'download'])->name('videos.download');


//blog like and comment public route
Route::post('/blogs/{blog}/comment', [CommentController::class, 'store'])->name('blogs.comment.store');
Route::post('/blogs/{blog}/like',[LikeController::class,'like'])->name('blogs.like');
Route::delete('/blogs/{blog}/unlike',[LikeController::class,'unlike'])->name('blogs.unlike');



//comment update and delete routes
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.delete');
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::patch('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');

//admin routes
Route::middleware(['isAdmin'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    // team routes
    Route::get('/admin/teams/create',[AdminTeamController::class,'create'])->name('admin.teams.create');
    Route::post('/admin/teams',[AdminTeamController::class,'store'])->name('admin.teams.store');
    Route::get('/admin/teams/{team}/edit', [AdminTeamController::class,'edit'])->name('admin.teams.edit');
    Route::put('/admin/teams/{team}', [AdminTeamController::class, 'update'])->name('admin.teams.update');
    Route::delete('/admin/teams/{team}', [AdminTeamController::class, 'destroy'])->name('admin.teams.delete');

    //player routes
    Route::get('/admin/players/create', [AdminPlayerController::class, 'create'])->name('admin.players.create');
    Route::post('/admin/players', [AdminPlayerController::class, 'store'])->name('admin.players.store');
    Route::get('/admin/players/{player}/edit', [AdminPlayerController::class, 'edit'])->name('admin.players.edit');
    Route::put('/admin/players/{player}', [AdminPlayerController::class, 'update'])->name('admin.players.update');
    Route::delete('/admin/players/{player}', [AdminPlayerController::class, 'destroy'])->name('admin.players.delete');

    //blog routes

    Route::get('/admin/blogs/create', [AdminBlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('/admin/blogs',[AdminBlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('/admin/blogs/{id}/edit', [AdminBlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::put('/admin/blogs/{id}', [AdminBlogController::class, 'update'])->name('admin.blogs.update');
    Route::delete('/admin/blogs/{id}', [AdminBlogController::class, 'destroy'])->name('admin.blogs.destroy');

    //video routes

    Route::get('/admin/videos/create',[AdminVideoController::class, 'create'])->name('admin.videos.create');
    Route::post('admin/videos',[AdminVideoController::class, 'store'])->name('admin.videos.store');
    Route::get('/admin/videos/{id}/edit', [AdminVideoController::class, 'edit'])->name('admin.videos.edit');
    Route::put('/admin/videos/{id}', [AdminVideoController::class, 'update'])->name('admin.videos.update');
    Route::delete('/admin/videos/{id}', [AdminVideoController::class, 'destroy'])->name('admin.videos.destroy');


    //user delete route
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

    

});

// Authenticated user routes
Route::middleware('isAuth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});

