<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    TimelineController, 
    StatusController, 
    ProfileController, 
    FollowingController,
    ExploreUserController,
    UpdateProfileController,
    UpdatePasswordController,
    GoogleController,
};

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('timeline', TimelineController::class)->name('timeline');
    Route::post('status/create', [StatusController::class, 'store'])->name('statuses.store');
    Route::get('user/explore', ExploreUserController::class)->name('users.index');
    
    Route::prefix('profile')->group(function () {
        Route::get('edit', [UpdateProfileController::class, 'edit'])->name('profile.edit');
        Route::put('update', [UpdateProfileController::class, 'update'])->name('profile.update');

        Route::get('edit/password', [UpdatePasswordController::class, 'edit'])->name('password.edit');
        Route::put('edit/password', [UpdatePasswordController::class, 'update']);

        Route::get('{user}/following', [FollowingController::class, 'following'])->name('profile.following');
        Route::get('{user}/followers', [FollowingController::class, 'followers'])->name('profile.followers');
        Route::post('{user}', [FollowingController::class, 'store'])->name('following.store');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('profile/{user}', ProfileController::class)->name('profile');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

require __DIR__.'/auth.php';
