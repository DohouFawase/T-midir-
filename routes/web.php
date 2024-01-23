<?php

use App\Http\Controllers\admin\DashbaordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Temidire\TemidireController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
Route::get('/', function () {
    return Inertia::render('StageBen5n', [
        
    ]);
});

|
*/

Route::get('/', function () {
    return Inertia::render('Temidire', [
        
    ]);
});


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('temidire')->group(function(){
    Route::get('temidire', [TemidireController::class, 'index']);
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('dashboard', [DashbaordController::class, 'index']);
});

require __DIR__.'/auth.php';