<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ElevatorTypeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\QuoteRequestController;
use App\Http\Controllers\Admin\WebsiteContentController;
use App\Http\Controllers\Admin\WebsiteSettingController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ElevatorTypeController as FrontendElevatorTypeController;
use App\Http\Controllers\Frontend\ServiceController
as FrontendServiceController;
use App\Http\Controllers\Frontend\ProjectController
as FrontendProjectController;
use App\Http\Controllers\Frontend\GalleryController
as FrontendGalleryController;
use App\Http\Controllers\Frontend\ContactController
as FrontendContactController;
use App\Http\Controllers\Frontend\QuoteController
as FrontendQuoteController;
use App\Http\Controllers\Admin\CabinDesignController;

use App\Http\Controllers\Frontend\CabinDesignController
as FrontendCabinDesignController;




Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get(
    '/',
    [HomeController::class, 'index']
)->name('home');

Route::get(
    '/about',
    [AboutController::class, 'index']
)->name('about');

Route::get(
    '/elevator-types',
    [FrontendElevatorTypeController::class, 'index']
)->name('elevator-types.index');

Route::get(
    '/elevator-types/{slug}',
    [FrontendElevatorTypeController::class, 'show']
)->name('elevator-types.show');

Route::get(
    '/services',
    [FrontendServiceController::class, 'index']
)->name('services.index');


Route::get(
    '/services/{slug}',
    [FrontendServiceController::class, 'show']
)->name('services.show');

Route::get(
    '/projects',
    [FrontendProjectController::class, 'index']
)->name('projects.index');


Route::get(
    '/projects/{slug}',
    [FrontendProjectController::class, 'show']
)->name('projects.show');

Route::get(
    '/gallery',
    [FrontendGalleryController::class, 'index']
)->name('gallery.index');

Route::get(
    '/contact',
    [FrontendContactController::class, 'index']
)->name('contact.index');


Route::post(
    '/contact',
    [FrontendContactController::class, 'store']
)->name('contact.store');

Route::get(
    '/get-quote',
    [FrontendQuoteController::class, 'index']
)->name('quote.index');


Route::post(
    '/get-quote',
    [FrontendQuoteController::class, 'store']
)->name('quote.store');

Route::get(
    '/cabin-designs',
    [FrontendCabinDesignController::class, 'index']
)->name('cabin-designs.index');

Route::get(
    '/cabin-designs/{slug}',
    [FrontendCabinDesignController::class, 'show']
)->name('cabin-designs.show');

/*
|--------------------------------------------------------------------------
| Admin Authentication
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/admin/login', [AuthController::class, 'showLogin'])
        ->name('admin.login');

    Route::post('/admin/login', [AuthController::class, 'login'])
        ->name('admin.login.submit');
});

/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::patch(
            'elevator-types/{elevatorType}/toggle-status',
            [ElevatorTypeController::class, 'toggleStatus']
        )->name('elevator-types.toggle-status');

        Route::patch(
            'services/{service}/toggle-status',
            [ServiceController::class, 'toggleStatus']
        )->name('services.toggle-status');

        Route::resource(
            'services',
            ServiceController::class
        );

        Route::patch(
            'projects/{project}/toggle-status',
            [ProjectController::class, 'toggleStatus']
        )->name('projects.toggle-status');


        Route::resource(
            'projects',
            ProjectController::class
        );

        /*
|--------------------------------------------------------------------------
| Gallery Management
|--------------------------------------------------------------------------
*/

        Route::patch(
            'gallery/{gallery}/toggle-status',
            [GalleryController::class, 'toggleStatus']
        )->name('gallery.toggle-status');


        Route::resource(
            'gallery',
            GalleryController::class
        );

        /*
|--------------------------------------------------------------------------
| Testimonials
|--------------------------------------------------------------------------
*/

        Route::patch(
            'testimonials/{testimonial}/toggle-status',
            [TestimonialController::class, 'toggleStatus']
        )->name('testimonials.toggle-status');


        Route::resource(
            'testimonials',
            TestimonialController::class
        );

        /*
|--------------------------------------------------------------------------
| Enquiries
|--------------------------------------------------------------------------
*/

        Route::get(
            'enquiries',
            [EnquiryController::class, 'index']
        )->name('enquiries.index');


        Route::get(
            'enquiries/{enquiry}',
            [EnquiryController::class, 'show']
        )->name('enquiries.show');


        Route::patch(
            'enquiries/{enquiry}/status',
            [EnquiryController::class, 'updateStatus']
        )->name('enquiries.status');


        Route::patch(
            'enquiries/{enquiry}/notes',
            [EnquiryController::class, 'updateNotes']
        )->name('enquiries.notes');


        Route::delete(
            'enquiries/{enquiry}',
            [EnquiryController::class, 'destroy']
        )->name('enquiries.destroy');

        /*
|--------------------------------------------------------------------------
| Quote Requests
|--------------------------------------------------------------------------
*/

        Route::get(
            'quote-requests',
            [QuoteRequestController::class, 'index']
        )->name('quote-requests.index');


        Route::get(
            'quote-requests/{quoteRequest}',
            [QuoteRequestController::class, 'show']
        )->name('quote-requests.show');


        Route::patch(
            'quote-requests/{quoteRequest}/status',
            [QuoteRequestController::class, 'updateStatus']
        )->name('quote-requests.status');


        Route::patch(
            'quote-requests/{quoteRequest}/notes',
            [QuoteRequestController::class, 'updateNotes']
        )->name('quote-requests.notes');


        Route::delete(
            'quote-requests/{quoteRequest}',
            [QuoteRequestController::class, 'destroy']
        )->name('quote-requests.destroy');

        /*
|--------------------------------------------------------------------------
| Website Content
|--------------------------------------------------------------------------
*/

        Route::get(
            'website-content',
            [WebsiteContentController::class, 'index']
        )->name('website-content.index');


        Route::get(
            'website-content/{page}/edit',
            [WebsiteContentController::class, 'edit']
        )->name('website-content.edit');


        Route::put(
            'website-content/{page}',
            [WebsiteContentController::class, 'update']
        )->name('website-content.update');

        /*
        |--------------------------------------------------------------------------
        | Website Settings
        |--------------------------------------------------------------------------
        */

        Route::get(
            'settings',
            [WebsiteSettingController::class, 'edit']
        )->name('settings.edit');


        Route::put(
            'settings',
            [WebsiteSettingController::class, 'update']
        )->name('settings.update');

        Route::resource(
            'cabin-designs',
            CabinDesignController::class
        )->except('show');

        Route::resource(
            'elevator-types',
            ElevatorTypeController::class
        );

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');




    });