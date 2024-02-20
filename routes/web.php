<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\HomeController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\Image;


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

Route::get('/',[HomeController::class, 'index']);
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::group(['prefix' => 'category'], function(){
        Route::get('/', function(){
            return view('admin.category.index', ['categories' => Category::all()]);
        })->name('admin.category.index');
        Route::get('/create', function(){
            return view('admin.category.create');
        })->name('admin.category.create');
        Route::post('/create', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::patch('/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });
    Route::group(['prefix' => 'post'], function(){
        Route::get('/', [PostController::class, 'index'])->name('admin.post.index');
        Route::get('/create', function(){
            return view('admin.post.create', ['categories' => Category::all()]);
        })->name('admin.post.create');
        Route::post('/create', [PostController::class, 'store'])->name('admin.post.store');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
        Route::patch('/update/{id}', [PostController::class, 'update'])->name('admin.post.update');
        Route::delete('/delete/{id}', [PostController::class, 'delete'])->name('admin.post.delete');
    });
    Route::group(['prefix' => 'gallery'], function(){
        Route::get('/', function(){
            return view('admin.gallery.index', ['galleries' => Gallery::all()]);
        })->name('admin.gallery.index');
        Route::get('/create', function(){
            return view('admin.gallery.create', ['posts' => Post::all()]);
        })->name('admin.gallery.create');
        Route::post('/create', [GalleryController::class, 'store'])->name('admin.gallery.store');
        Route::get('/edit/{id}', [GalleryController::class, 'edit'])->name('admin.gallery.edit');
        Route::patch('/update/{id}', [GalleryController::class, 'update'])->name('admin.gallery.update');
        Route::delete('/delete/{id}', [GalleryController::class, 'delete'])->name('admin.gallery.delete');
    });
    Route::group(['prefix' => 'image'], function(){
        Route::get('/', function(){
            return view('admin.image.index', ['images' => Image::all()]);
        })->name('admin.image.index');
        Route::get('/create', function(){
            return view('admin.image.create', ['galleries' => Gallery::all()]);
        })->name('admin.image.create');
        Route::post('/create', [ImageController::class, 'store'])->name('admin.image.store');
        Route::get('/edit/{id}', [ImageController::class, 'edit'])->name('admin.image.edit');
        Route::patch('/update/{id}', [ImageController::class, 'update'])->name('admin.image.update');
        Route::delete('/delete/{id}', [ImageController::class, 'delete'])->name('admin.image.delete');
    });
});
Route::group(['middleware' => 'guest'], function(){
    Route::get('register', function(){return view('admin.auth.register');})->name('register');
    Route::post('signup', [AuthController::class, 'signup'])->name('signup');
    Route::post('signin', [AuthController::class, 'signin'])->name('signin');
    Route::get('login', function(){ return view('admin.auth.login');})->name('login');

});

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
