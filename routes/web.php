<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\JobOfferController;
use App\Http\Controllers\Employeur\emJobOfferController;
use App\Http\Controllers\Employeur\ApplicationController;
use App\Http\Controllers\candidat\CandidatController;
use App\Models\JobOffer;


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
    $jobOffers = JobOffer::all(); // Fetch job offers
    return view('welcome', compact('jobOffers')); // Pass job offers to the welcome view
});
// header
Route::middleware(['auth'])->group(function () {
    Route::get('/employeur/job-offers', [JobOfferController::class, 'index'])->name('employeur.job-offers.index');
    Route::get('/candidat', [CandidatController::class, 'index'])->name('candidat.index');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

// auth
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
// admin view
Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', [DashboardController::class, 'adminIndex'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('job_offers', JobOfferController::class);
});

// employeur view
Route::middleware(['auth', 'role:employeur'])->prefix('employeur')->name('employeur.')->group(function () {
    Route::resource('job-offers', emJobOfferController::class);
    Route::get('/job-offers/{jobOffer}/edit', [emJobOfferController::class, 'edit'])->name('job-offers.edit');
    Route::put('/job-offers/{jobOffer}', [emJobOfferController::class, 'update'])->name('job-offers.update');
    Route::get('/job-offers/{jobOffer}/applications', [ApplicationController::class, 'index'])->name('job-offers.applications.index');
    Route::delete('/job-offers/applications/{application}', [ApplicationController::class, 'destroy'])->name('job-offers.applications.destroy');
});


Route::middleware(['auth', 'role:candidat'])->prefix('candidat')->name('candidat.')->group(function () {
    Route::get('/job-offers', [CandidatController::class, 'showJobOffers'])->name('job-offers.index');
    Route::post('/job-offers/apply/{jobOffer}', [CandidatController::class, 'applyJobOffer'])->name('job-offers.apply');
    Route::get('/profile', [CandidatController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile', [CandidatController::class, 'updateProfile'])->name('profile.update');
});



require __DIR__.'/auth.php';