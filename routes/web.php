<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\InPagecpagController;
use App\Http\Controllers\InPagecpcController;
use App\Http\Controllers\InPagecpmController;
use App\Http\Controllers\InPagescpcController;
use App\Http\Controllers\InterstitialcpagController;
use App\Http\Controllers\OnclickcpagController;
use App\Http\Controllers\OnclickcpmController;
use App\Http\Controllers\OnclickscpmController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PushcpagController;
use App\Http\Controllers\PushcpcController;
use App\Http\Controllers\PushcpmController;
use App\Http\Controllers\PushscpcController;
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
    Route::get('/campaign-list',[CampaignController::class,'index'])->name('campaignlist');
    //the rest is campaign plans
    Route::get('/onclick-cpag',[OnclickcpagController::class,'index'])->name('onclickcpag');
    Route::post('/onclick-cpag-create',[OnclickcpagController::class,'create']);
    Route::get('/onclick-cpm',[OnclickcpmController::class,'index'])->name('onclickcpm');
    Route::post('/onclick-cpm-create',[OnclickcpmController::class,'create']);
    Route::get('/onclick-scpm',[OnclickscpmController::class,'index'])->name('onclickscpm');
    Route::post('/onclick-scpm-create',[OnclickscpmController::class,'create']);
    Route::get('/push-cpag',[PushcpagController::class,'index'])->name('pushcpag');
    Route::post('/push-cpag-create',[PushcpagController::class,'create']);
    Route::get('/push-cpc',[PushcpcController::class,'index'])->name('pushcpc');
    Route::post('/push-cpc-create',[PushcpcController::class,'create']);
    Route::get('/push-scpc',[PushscpcController::class,'index'])->name('pushscpc');
    Route::post('/push-scpc-create',[PushscpcController::class,'create']);
    Route::get('/push-cpm',[PushcpmController::class,'index'])->name('pushcpm');
    Route::post('/push-cpm-create',[PushcpmController::class,'create']);
    Route::get('/in-page-cpag',[InPagecpagController::class,'index'])->name('inpagecpag');
    Route::post('/in-page-cpag-create',[InPagecpagController::class,'create']);
    Route::get('/in-page-cpc',[InPagecpcController::class,'index'])->name('inpagecpc');
    Route::post('/in-page-cpc-create',[InPagecpcController::class,'create']);
    Route::get('/in-page-scpc',[InPagescpcController::class,'index'])->name('inpagescpc');
    Route::post('/in-page-scpc-create',[InPagescpcController::class,'create']);
    Route::get('/in-page-cpm',[InPagecpmController::class,'index'])->name('inpagecpm');
    Route::post('/in-page-cpm-create',[InPagecpmController::class,'create']);
    Route::get('/interstitial-cpag',[InterstitialcpagController::class,'index'])->name('interstitialcpag');
    Route::post('/interstitial-cpag-create',[InterstitialcpagController::class,'create']);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
