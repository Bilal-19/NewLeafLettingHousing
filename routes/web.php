<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get("/", [TenantController::class, 'index'])->name('Home');
Route::get("/about", [TenantController::class, 'About'])->name('About');
Route::get("/csr", [TenantController::class, 'CSR'])->name('CSR');
Route::get("/landlords", [TenantController::class, 'Landlords'])->name('Landlords');
Route::get("/faqs", [TenantController::class, 'FAQs'])->name('FAQs');
Route::get("/contact", [TenantController::class, 'Contact'])->name('Contact');
Route::get("/properties", [TenantController::class, 'Properties'])->name('Properties');


// Admin
Route::get("/admin", [AdminController::class, 'Dashboard'])->name('Dashboard');
