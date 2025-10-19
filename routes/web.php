<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/home', function() {
    return "Hello, World!";
});

Route::post('/register_user', function() {
    return "register the user";
});

Route::post('/create_post', function() {
    return "Create the post";
});

Route::get('/my_posts', function() {
    return "Your posts: ";
});

Route::get('/posts', function() {
    return "All posts: ";
});

Route::get('/posts/{post}', function() {
    return 'post details: ';
});

Route::post('/login_user', function() {
    return 'login page';
});

Route::post('/create_comment', function() {
    return 'Write your comment: ';
});

Route::patch('/update_post', function() {
    return 'Edit your post: ';
});

Route::get('/user_profile', function() {
    return 'User profile';
});

Route::get('user/{id}', function() {
    return "User's profile...";
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

require __DIR__.'/auth.php';
