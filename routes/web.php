<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientUnificationController;
use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('admin/unification', ClientUnificationController::class)
->names([
            'index' => 'unification.index',
            'create' => 'unification.create',
            'store' => 'unification.store',
            'edit' => 'unification.edit',
            'update' => 'unification.update',
            'destroy' => 'unification.destroy',
            'show' => 'unification.show'
]);

Route::any('/openpay/webhook', [WebhookController::class ,'createWebhook']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

