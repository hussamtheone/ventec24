<?php

use App\Http\Controllers\Admin\Admincontroller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//user route
require __DIR__.'/auth.php';
route::middleware(['auth', 'Usermiddleware'])->group(function(){

    route::get('dashboard',[UserController::class,'index'])->name('dashboard');
    route::get('contact', [ContactController::class, 'index'])->name('contact');
});
//admin route
route::middleware(['auth', 'Adminmiddleware'])->group(function(){

    route::get('/admin/dashboard',[Admincontroller::class,'index'])->name('admin.dashboard');
});