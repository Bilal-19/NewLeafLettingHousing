<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandlordController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get("/", [TenantController::class, 'index'])->name('Home');
Route::get("/about", [TenantController::class, 'About'])->name('About');
Route::get("/csr", [TenantController::class, 'CSR'])->name('CSR');
Route::get("/landlords", [TenantController::class, 'Landlords'])->name('Landlords');
Route::get("/faqs", [TenantController::class, 'FAQs'])->name('FAQs');
Route::get("/contact", [TenantController::class, 'Contact'])->name('Contact');
Route::get("/available/properties", [TenantController::class, 'Properties'])->name('Properties');
Route::post("/submit/inquiry", [TenantController::class, 'submitInquiry'])->name('Submit.Inquiry');
Route::get("/view/detail/property/{id}", [TenantController::class, 'viewDetailProperty'])->name('View.Detail.Property');
Route::post("/submit/feedback/{id}", [TenantController::class, 'submitFeedback'])->name('Submit.Feedback');
Route::post("/book/property/{id}", [TenantController::class, 'BookedProperty'])->name('Booked.Property');


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
Route::get("/admin/landlords/inquiries", [AdminController::class, 'LandlordQueries'])->name('Admin.Landlord.Queries');
Route::get("/admin/logout", [AdminController::class, 'signOut'])->name('Admin.signOut');

Route::get("/admin/stories", [AdminController::class, 'Stories'])->name('Admin.Stories');
Route::get("/admin/add/story", [AdminController::class, 'AddStory'])->name('Add.Story');
Route::post("/admin/create/story", [AdminController::class, 'createStory'])->name('Create.Story');
Route::get("/admin/edit/story/{id}", [AdminController::class, 'editStory'])->name('Edit.Story');
Route::post("/admin/edit/story/{id}", [AdminController::class, 'updateStory'])->name('Update.Story');
Route::get("/admin/delete/story/{id}", [AdminController::class, 'deleteStory'])->name('Delete.Story');


Route::get("/admin/booked/properties", [AdminController::class, 'BookProperties'])->name('Admin.BookProperties');
Route::get("/admin/testimonials", [AdminController::class, 'Testimonials'])->name('Admin.Testimonials');
Route::get("/admin/testimonials/{id}", [AdminController::class, 'toggleTestimonialVisibility'])->name('Admin.ToggleTestimonials');
Route::get("/admin/testimonials/landlord/{id}", [AdminController::class, 'toggleLandlordFeedback'])->name('Admin.ToggleLandlordTestimonials');

Route::get("/admin/faqs", [AdminController::class, 'FAQs'])->name('Admin.FAQs');
Route::get("/admin/add/faqs", [AdminController::class, 'AddFAQ'])->name('Add.FAQ');
Route::post("/admin/create/faq", [AdminController::class, 'createFAQ'])->name('Create.FAQ');
Route::get("/admin/edit/faq/{id}", [AdminController::class, 'EditFAQ'])->name('Edit.FAQ');
Route::post("/admin/update/faq/{id}", [AdminController::class, 'updateFAQ'])->name('Update.FAQ');
Route::get("/admin/delete/faq/{id}", [AdminController::class, 'deleteFAQ'])->name('Delete.FAQ');


Route::get("/admin/team/members", [AdminController::class, 'TeamMembers'])->name('Admin.TeamMembers');
Route::get("/admin/add/team", [AdminController::class, 'AddTeamMember'])->name('Admin.AddTeam');
Route::post("/admin/create/team", [AdminController::class, 'createTeamMember'])->name('Admin.Create.Team.Member');
Route::get("/admin/edit/team/{id}", [AdminController::class, 'editTeamMember'])->name('Admin.EditTeam');
Route::post("/admin/update/team/{id}", [AdminController::class, 'updateTeamMember'])->name('Admin.Update.Team');
Route::get("/admin/delete/team/{id}", [AdminController::class, 'deleteMember'])->name('Admin.Delete.Team');

Route::get("/admin/partner/companies", [AdminController::class, 'PartnerCompanies'])->name('Admin.PartnerCompanies');
Route::get("/admin/add/partner/companies", [AdminController::class, 'AddPartner'])->name('Admin.Add.Partner');
Route::post("/admin/create/partnership", [AdminController::class, 'createPartnership'])->name('Admin.Create.Partnership');
Route::get("/admin/edit/partner/{id}", [AdminController::class, 'editPartner'])->name('Admin.Edit.Partner');
Route::post("/admin/update/partner/{id}", [AdminController::class, 'updatePartnerCompany'])->name('Admin.Update.Partner');
Route::get("/admin/delete/partner/{id}", [AdminController::class, 'deletePartnerCompamy'])->name('Admin.Delete.Partner');


Route::get("/admin/customer/inquiries", [AdminController::class, 'CustomerQueries'])->name('Admin.CustomerQueries');


// Landlord Dashboard
Route::get("/landlord/dashboard", [LandlordController::class, 'index'])->name('Landlord.Dashboard');

Route::get("/landlord/upload/properties", [LandlordController::class, 'uploadProperties'])->name('Landlord.UploadProperties');
Route::post("/landlord/create/property", [LandlordController::class, 'createProperties'])->name('Landlord.CreateProperties');
Route::get("/landlord/view/property/{id}", [LandlordController::class, 'viewDetailProperty'])->name('Landlord.ViewProperty');
Route::get("/landlord/property/status/{id}", [LandlordController::class, 'togglePropertyStatus'])->name('Landlord.TogglePropertyStatus');
Route::get("/landlord/edit/property/{id}", [LandlordController::class, 'editProperty'])->name('Landlord.EditProperty');
Route::post("/landlord/update/property/{id}", [LandlordController::class, 'updateProperty'])->name('Landlord.UpdateProperty');
Route::get("/landlord/delete/property/{id}", [LandlordController::class, 'deleteProperty'])->name('Landlord.DeleteProperty');


Route::get("/landlord/manage/dashboard", [LandlordController::class, 'manageProperties'])->name('Landlord.ManageProperties');
Route::get("/landlord/list/tenants", [LandlordController::class, 'listTenants'])->name('Landlord.ListTenants');
Route::get("/landlord/booked/properties", [LandlordController::class, 'bookedProperties'])->name('Landlord.BookedProperties');
Route::get("/landlord/profile", [LandlordController::class, 'myProfile'])->name('Landlord.Profile');
Route::post("/landlord/update/profile", [LandlordController::class, 'updateProfile'])->name('Landlord.Update.Profile');
Route::get("/landlord/signout", [LandlordController::class, 'SingOut'])->name('Landlord.SingOut');
Route::get("/landlord/feedback", [LandlordController::class, 'feedbackForm'])->name('Landlord.FeedbackForm');
Route::post("/landlord/submit/feedback", [LandlordController::class, 'submitFeeback'])->name('Landlord.SubmitFeeback');
