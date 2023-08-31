<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\productController;
use App\Http\Controllers\SubscriberController;


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

//mail subscribe

Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe.post');


// longin system
//Route::group(['middaleware'=>['web','auth']],function (){
//
//});
Route::get('/', [CustomAuthController::class, 'login'])->name('login');
Route::post('/', [CustomAuthController::class, 'loginpost'])->name('login.post');
Route::get('/register', [CustomAuthController::class, 'register'])->name('register');
Route::post('/register', [CustomAuthController::class, 'registerpost'])->name('register.post');
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');
Route::get('/forgotpassword', [CustomAuthController::class, 'forgotPassword'])->name('forgotpassword');
Route::POST('/forgotpassword', [CustomAuthController::class, 'forgotPasswordPost'])->name('forgotpassword.post');
Route::get('/resetpassword/{token}', [CustomAuthController::class, 'resetPassword'])->name('resetpassword');
Route::POST('/resetpassword', [CustomAuthController::class, 'resetPasswordPost'])->name('resetpassword.post');


Route::group(['middleware' => 'auth'], function () {


// student froms routes

    Route::group(['prefix' => '/student'], function () {
        Route::get('/welcome', [studentController::class, 'welcome'])->name('home');
        Route::get('/welcome', [studentController::class, 'Blog_post'])->name('blog');
        Route::get('/form', [studentController::class, 'index'])->name('student.form');
        Route::POST('/form', [studentController::class, 'store']);
        Route::get('/view', [studentController::class, 'view'])->name('student.view');
        Route::get('/delete/{id}', [studentController::class, 'delete']);
        Route::get('/edit/{id}', [studentController::class, 'edit']);
        Route::post('/update/{id}', [studentController::class, 'update']);
        Route::get('/details/{id}', [studentController::class, 'details'])->name('student.details');
        Route::get('/about', [studentController::class, 'about'])->name('student.about');
        Route::get('/course', [studentController::class, 'course'])->name('student.course');
        Route::get('/attendance', [studentController::class, 'attendance'])->name('attendance');
        Route::post('/attendance/store', [studentController::class, 'stor_attendance'])->name('attendance.post');
        Route::get('/blog', [studentController::class, 'addBlog'])->name('blog');
        Route::post('/blog/{slug}/comment', [studentController::class, 'comments'])->name('blog.comments');
        Route::get('/blog/{slug}/comment', [studentController::class, 'showComment'])->name('show.comments');


    });


 //Product routes
    Route::group(['prefix' => '/product'], function () {
        Route::get('/product', [productController::class, 'index']);
        Route::POST('/product', [productController::class, 'store'])->name('product.post');
        Route::get('/show', [productController::class, 'fetchproduct'])->name('product.show');
        Route::delete('/delete/{id}', [productController::class, 'destroy'])->name('delete');
        Route::get('/edit/{id}', [productController::class, 'edit'])->name('edit');
        Route::PUT('/update/{id}', [productController::class, 'update'])->name('update');
    });


});