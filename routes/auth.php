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

        $user = new User;

        $user->name = $user->name;
        $user->email = $user->email;
        $user->twitch_id = $user->id;
        $user->twitch_access_token = $user->access_token;
        $user->twitch_refresh_token = $user->refresh_token;
        $user->twitch_expires_in = $user->expires_in;
        $user->twitch_avatar_url = $user->avatar;

        $user->save();

        return "HEHEHE HAH";
    });
});

Route::post('logout', App\Livewire\Actions\Logout::class)
    ->name('logout');
