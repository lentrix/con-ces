<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Models\Patient;
use App\Models\Service;
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
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
    
    return Inertia::render('UserLogin');
});

Route::get('/dashboard', function () {
    $data = [
        'patient_count' => Patient::count(),
        'services_count' => Service::count()
    ];
    return Inertia::render('Dashboard', compact('data'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/patients', [PatientController::class, 'index'])->name('patients');
    Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
    Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
    Route::post('/patients/search', [PatientController::class, 'search'])->name('patients.search');
    Route::get('/patients/{patient}', [PatientController::class, 'show'])->name('patient.show');
    Route::get('/patients/{patient}/add-service', [PatientController::class, 'addService'])->name('patient.add-service');
    Route::post('/patients/{patient}/add-service', [PatientController::class, 'recordService'])->name('patient.record-service');

    Route::delete('/services/{service}', [PatientController::class, 'deleteService'])->name('patients.delete-service');
});

require __DIR__.'/auth.php';
