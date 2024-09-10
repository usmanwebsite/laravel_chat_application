<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::view('/', 'welcome');

Route::get('dashboard', function () {
    $user = User::where('id', '!=', Auth::user()->id)->get();
    // dd($user);
    return view('dashboard', ['users' => $user]);
})->middleware(['auth', 'verified'])->name('dashboard');




Route::get('chat/{id}', function ($id) {
// dd('hello');
    return view('chat',[
        'id' => $id
    ]);
})->middleware(['auth', 'verified'])->name('chat');




Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
