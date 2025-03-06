<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Route::get("login", function() {
        return Socialite::driver("twitch")->redirect();
    });

    Route::get("twitch/auth", function() {
        $user = Socialite::driver("twitch")->user();
        dd($user);
    });
});


Route::post('logout', App\Livewire\Actions\Logout::class)
    ->name('logout')
