<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', function (){
    return view('pages.home');
})->middleware('auth')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::post('/colocations', [ColocationController::class, 'store'])->name('colocations');
    Route::get('/colocations/{colocation}', [ColocationController::class, 'show'])->name('colocations.show');
    Route::post('/colocations/invite', [ColocationController::class, 'invite'])->name('colocations.invite');
});

Route::get('/invitations/{token}', 
    [ColocationController::class, 'joinWithInvitation']
)->name('invitations.accept')->middleware('auth');

Route::post('/join', 
    [ColocationController::class, 'joinWithJoinToken']
)->name('colocations.join')->middleware('auth');

Route::middleware('auth')->group(function() {
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
});

require __DIR__.'/auth.php';
