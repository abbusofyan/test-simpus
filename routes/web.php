
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

// BUG 1: method create should be GET, store should be POST (swapped)
Route::get('/patients', [PatientController::class, 'store'])->name('patients.store');
Route::post('/patients/create', [PatientController::class, 'create'])->name('patients.create');
