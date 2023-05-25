<?php

use App\Http\Controllers\OnclickcpagController;
use App\Http\Controllers\OnclickcpmController;
use App\Http\Controllers\OnclickscpmController;
use App\Http\Controllers\ProfileController;
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
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/traffic-chart', function () {
    return Inertia::render('TrafficChart');
})->middleware(['auth', 'verified'])->name('traffic');

Route::get('/conversion', function () {
    return Inertia::render('Conversion');
})->middleware(['auth', 'verified'])->name('conversion');

Route::get('/finance', function () {
    return Inertia::render('Finance');
})->middleware(['auth', 'verified'])->name('finance');


//create campaign routes
Route::middleware('auth')->group(function (){
    Route::get('/onclick-cpag',[OnclickcpagController::class,'index'])->name('onclickcpag');
    Route::post('/onclick-cpag-create',[OnclickcpagController::class,'create']);
    Route::get('/onclick-cpm',[OnclickcpmController::class,'index'])->name('onclickcpm');
    Route::post('/onclick-cpm-create',[OnclickcpmController::class,'create']);
    Route::get('/onclick-scpm',[OnclickscpmController::class,'index'])->name('onclickscpm');
    Route::post('/onclick-scpm-create',[OnclickscpmController::class,'create']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
