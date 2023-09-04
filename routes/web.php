<?php

use App\Http\Controllers\CampaignListController;
use App\Http\Controllers\CampaignController;
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
    //campaign list
    Route::get('/campaign-list',[CampaignListController::class,'index'])->name('campaignlist');
    //the rest is campaign plans
    Route::get('/create-campaign',[CampaignController::class,'index'])->name('createcampaign');
    Route::post('/create-campaign-create',[CampaignController::class,'create']);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
