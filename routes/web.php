<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\TestController;
use App\Http\Controllers\NodeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SubscriptionController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [TestController::class, 'index']);


Route::get('/dashboard', function () {
    $nodes = DB::table('nodes')->paginate(3);
    return view('dashboard', ['nodes' => $nodes]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/sub/addr/{uid}/{subscription_token}', [SubscriptionController::class, 'index'])->name('subscription.address');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/nodes/{node}/qrcode', [NodeController::class, 'showQRCode'])->name('node.qrcode');

    Route::get('/sub/reset/{field}', [SubscriptionController::class, 'reset'])->name('subscription.reset');
});

Route::middleware('isAdmin')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class)->except([
        'create', 'store', 'show'
    ]);

    Route::resource('nodes', NodeController::class)->except([
        'show', 'index'
    ]);
});

require __DIR__.'/auth.php';
