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
Route::get("/admin/dashboard", [AdminController::class, 'Dashboard'])->name('Admin.Dashboard');

Route::get("/admin/services", [AdminController::class, 'Services'])->name('Admin.Services');
Route::get("/admin/add/services", [AdminController::class, 'AddService'])->name('Admin.AddService');
Route::post("/admin/create/service", [AdminController::class, 'createService'])->name('Create.Service');
Route::get("/admin/edit/service/{id}", [AdminController::class, 'editService'])->name('Edit.Service');
Route::post("/admin/update/service/{id}", [AdminController::class, 'updateService'])->name('Update.Service');
Route::get("/admin/delete/service/{id}", [AdminController::class, 'deleteService'])->name('Delete.Service');


Route::get("/admin/tenants", [AdminController::class, 'Tenants'])->name('Admin.Tenants');
Route::get("/admin/landlords", [AdminController::class, 'Landlords'])->name('Admin.Landlords');

Route::get("/admin/stories", [AdminController::class, 'Stories'])->name('Admin.Stories');
Route::get("/admin/add/story", [AdminController::class, 'AddStory'])->name('Add.Story');
Route::post("/admin/create/story", [AdminController::class, 'createStory'])->name('Create.Story');

Route::get("/admin/booked/properties", [AdminController::class, 'BookProperties'])->name('Admin.BookProperties');
Route::get("/admin/testimonials", [AdminController::class, 'Testimonials'])->name('Admin.Testimonials');
Route::get("/admin/faqs", [AdminController::class, 'FAQs'])->name('Admin.FAQs');
Route::get("/admin/team/members", [AdminController::class, 'TeamMembers'])->name('Admin.TeamMembers');
Route::get("/admin/partner/companies", [AdminController::class, 'PartnerCompanies'])->name('Admin.PartnerCompanies');
Route::get("/admin/customer/inquiries", [AdminController::class, 'CustomerQueries'])->name('Admin.CustomerQueries');
