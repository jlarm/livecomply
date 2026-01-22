<?php

declare(strict_types=1);

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

Route::get('/', fn (): Factory|View => view('welcome'))->name('home');

Route::middleware(['auth', 'verified'])->group(static function (): void {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::view('users', 'central.user.index')
        ->middleware('can:viewAny, App\Models\User')
        ->name('users.index');
    Route::view('users/open-invites', 'central.user.open-invites')
        ->middleware('can:viewAny, App\Models\Invitation')
        ->name('users.open-invites');
});

require __DIR__.'/settings.php';
