<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientUnificationController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

Route::any('/openpay/webhook', [WebhookController::class ,'handle']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

