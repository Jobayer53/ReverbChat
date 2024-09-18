<?php

use App\Livewire\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::view('/', 'welcome');
// Route::get('/', Home::class)->name('home');
// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');
Route::get('dashboard', [ChatController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/chat', [ChatController::class,'index'])->middleware(['auth', 'verified'])->name('chat');
Route::get('/chat/{id}', [ChatController::class,'chat'])->middleware(['auth', 'verified'])->name('chatUser');
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::post('/user/register', [ChatController::class, 'register'])->name('user.register');



require __DIR__.'/auth.php';
