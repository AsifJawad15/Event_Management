<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminHomeBannerController;
use App\Http\Controllers\Admin\AdminHomeWelcomeController;
use App\Http\Controllers\Admin\AdminHomeCounterController;
use App\Http\Controllers\Admin\AdminSpeakerController;
use App\Http\Controllers\Admin\AdminScheduleDayController;
use App\Http\Controllers\Admin\AdminScheduleController;
use App\Http\Controllers\Admin\AdminScheduleSpeakerController;
use App\Http\Controllers\Admin\SponsorCategoryController;
use App\Http\Controllers\Admin\AdminSponsorController;
use App\Http\Controllers\Admin\AdminOrganiserController;
use App\Http\Controllers\Admin\AdminAccommodationController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminPackageController;

// Front
Route::get('/', [FrontController::class, 'home'])->name('front.home');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');
Route::post('/contact', [FrontController::class, 'contact_submit'])->name('contact.submit');
Route::get('/speakers', [FrontController::class, 'speakers'])->name('front.speakers');
Route::get('/speaker/{slug}', [FrontController::class, 'speaker'])->name('front.speaker');
Route::get('/schedule', [FrontController::class, 'schedule'])->name('front.schedule');
Route::get('/sponsors', [FrontController::class, 'sponsors'])->name('front.sponsors');
Route::get('/sponsor/{slug}', [FrontController::class, 'sponsor'])->name('front.sponsor.detail');
Route::get('/organisers', [FrontController::class, 'organisers'])->name('front.organisers');
Route::get('/organiser/{slug}', [FrontController::class, 'organiser'])->name('front.organiser.detail');
Route::get('/accommodations', [FrontController::class, 'accommodations'])->name('front.accommodations');
Route::get('/photo-gallery', [FrontController::class, 'photo_gallery'])->name('front.photo_gallery');
Route::get('/video-gallery', [FrontController::class, 'video_gallery'])->name('front.video_gallery');
Route::get('/faq', [FrontController::class, 'faq'])->name('front.faq');
Route::get('/testimonials', [FrontController::class, 'testimonials'])->name('front.testimonials');
Route::get('/blog', [FrontController::class, 'blog'])->name('front.blog');
Route::get('/post/{slug}', [FrontController::class, 'post'])->name('front.post');
Route::get('/pricing', [FrontController::class, 'pricing'])->name('front.pricing');

// User
Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[UserController::class,'dashboard'])->name('user.dashboard');
    Route::get('/profile',[UserController::class,'profile'])->name('user.profile');
    Route::post('/profile',[UserController::class,'profile_update'])->name('user.profile.update');
});
Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/register_submit',[UserController::class,'register_submit'])->name('register_submit');
Route::get('/register_verify/{token}/{email}',[UserController::class,'register_verify'])->name('register_verify');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'login_submit'])->name('login_submit');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::get('/forget_password',[UserController::class,'forget_password'])->name('forget_password');
Route::post('/forget_password',[UserController::class,'forget_password_submit'])->name('forget_password_submit');
Route::get('/reset-password/{token}/{email}',[UserController::class,'reset_password'])->name('reset_password');
Route::post('/reset-password/{token}/{email}',[UserController::class,'reset_password_submit'])->name('reset_password_submit');


// Admin
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard',[AdminDashboardController::class,'dashboard'])->name('admin_dashboard');
    Route::get('/profile',[AdminAuthController::class,'profile'])->name('admin_profile');
    Route::post('/profile',[AdminDashboardController::class,'profile_update'])->name('admin_profile_update');
    Route::get('/home-banner',[AdminHomeBannerController::class,'index'])->name('admin_home_banner');
    Route::post('/home-banner',[AdminHomeBannerController::class,'update'])->name('admin_home_banner_update');
    Route::get('/home-welcome',[AdminHomeWelcomeController::class,'index'])->name('admin_home_welcome');
    Route::post('/home-welcome',[AdminHomeWelcomeController::class,'update'])->name('admin_home_welcome_update');
    Route::get('/homecounter',[AdminHomeCounterController::class,'index'])->name('admin_home_counter');
    Route::put('/homecounter/{id}',[AdminHomeCounterController::class,'update'])->name('admin_home_counter_update');

    // Speaker routes
    Route::get('/speakers',[AdminSpeakerController::class,'index'])->name('admin_speaker_index');
    Route::get('/speakers/create',[AdminSpeakerController::class,'create'])->name('admin_speaker_create');
    Route::post('/speakers',[AdminSpeakerController::class,'store'])->name('admin_speaker_store');
    Route::get('/speakers/{id}/edit',[AdminSpeakerController::class,'edit'])->name('admin_speaker_edit');
    Route::put('/speakers/{id}',[AdminSpeakerController::class,'update'])->name('admin_speaker_update');
    Route::delete('/speakers/{id}',[AdminSpeakerController::class,'destroy'])->name('admin_speaker_destroy');

    // Schedule Day routes
    Route::get('/schedule-days',[AdminScheduleDayController::class,'index'])->name('admin_schedule_day_index');
    Route::get('/schedule-days/create',[AdminScheduleDayController::class,'create'])->name('admin_schedule_day_create');
    Route::post('/schedule-days',[AdminScheduleDayController::class,'store'])->name('admin_schedule_day_store');
    Route::get('/schedule-days/{id}/edit',[AdminScheduleDayController::class,'edit'])->name('admin_schedule_day_edit');
    Route::put('/schedule-days/{id}',[AdminScheduleDayController::class,'update'])->name('admin_schedule_day_update');
    Route::delete('/schedule-days/{id}',[AdminScheduleDayController::class,'destroy'])->name('admin_schedule_day_destroy');

    // Schedule routes
    Route::get('/schedules',[AdminScheduleController::class,'index'])->name('admin_schedule_index');
    Route::get('/schedules/create',[AdminScheduleController::class,'create'])->name('admin_schedule_create');
    Route::post('/schedules',[AdminScheduleController::class,'store'])->name('admin_schedule_store');
    Route::get('/schedules/{id}/edit',[AdminScheduleController::class,'edit'])->name('admin_schedule_edit');
    Route::put('/schedules/{id}',[AdminScheduleController::class,'update'])->name('admin_schedule_update');
    Route::delete('/schedules/{id}',[AdminScheduleController::class,'destroy'])->name('admin_schedule_destroy');

    // Speaker Schedule routes
    Route::get('/speaker_schedule_index',[AdminScheduleSpeakerController::class,'index'])->name('admin_speaker_schedule_index');
    Route::post('/speaker_schedule_store',[AdminScheduleSpeakerController::class,'store'])->name('admin_speaker_schedule_store');
    Route::delete('/speaker_schedule_delete/{id}',[AdminScheduleSpeakerController::class,'delete'])->name('admin_speaker_schedule_delete');

    // Sponsor routes
    Route::get('/sponsors',[AdminSponsorController::class,'index'])->name('admin_sponsor_index');
    Route::get('/sponsors/create',[AdminSponsorController::class,'create'])->name('admin_sponsor_create');
    Route::post('/sponsors',[AdminSponsorController::class,'store'])->name('admin_sponsor_store');
    Route::get('/sponsors/{id}/edit',[AdminSponsorController::class,'edit'])->name('admin_sponsor_edit');
    Route::put('/sponsors/{id}',[AdminSponsorController::class,'update'])->name('admin_sponsor_update');
    Route::delete('/sponsors/{id}',[AdminSponsorController::class,'destroy'])->name('admin_sponsor_destroy');

    // Organiser routes
    Route::get('/organisers',[AdminOrganiserController::class,'index'])->name('admin_organiser_index');
    Route::get('/organisers/create',[AdminOrganiserController::class,'create'])->name('admin_organiser_create');
    Route::post('/organisers',[AdminOrganiserController::class,'store'])->name('admin_organiser_store');
    Route::get('/organisers/{id}/edit',[AdminOrganiserController::class,'edit'])->name('admin_organiser_edit');
    Route::put('/organisers/{id}',[AdminOrganiserController::class,'update'])->name('admin_organiser_update');
    Route::delete('/organisers/{id}',[AdminOrganiserController::class,'destroy'])->name('admin_organiser_destroy');

    // Accommodation routes
    Route::get('/accommodations',[AdminAccommodationController::class,'index'])->name('admin_accommodation_index');
    Route::get('/accommodations/create',[AdminAccommodationController::class,'create'])->name('admin_accommodation_create');
    Route::post('/accommodations',[AdminAccommodationController::class,'store'])->name('admin_accommodation_store');
    Route::get('/accommodations/{id}/edit',[AdminAccommodationController::class,'edit'])->name('admin_accommodation_edit');
    Route::put('/accommodations/{id}',[AdminAccommodationController::class,'update'])->name('admin_accommodation_update');
    Route::delete('/accommodations/{id}',[AdminAccommodationController::class,'destroy'])->name('admin_accommodation_destroy');

    // Photo Gallery routes
    Route::get('/photo-gallery',[AdminPhotoController::class,'index'])->name('admin_photo_index');
    Route::get('/photo-gallery/create',[AdminPhotoController::class,'create'])->name('admin_photo_create');
    Route::post('/photo-gallery',[AdminPhotoController::class,'store'])->name('admin_photo_store');
    Route::get('/photo-gallery/{id}/edit',[AdminPhotoController::class,'edit'])->name('admin_photo_edit');
    Route::put('/photo-gallery/{id}',[AdminPhotoController::class,'update'])->name('admin_photo_update');
    Route::delete('/photo-gallery/{id}',[AdminPhotoController::class,'destroy'])->name('admin_photo_delete');

    // Video Gallery routes
    Route::get('/video-gallery',[AdminVideoController::class,'index'])->name('admin_video_index');
    Route::get('/video-gallery/create',[AdminVideoController::class,'create'])->name('admin_video_create');
    Route::post('/video-gallery',[AdminVideoController::class,'store'])->name('admin_video_store');
    Route::get('/video-gallery/{video}/edit',[AdminVideoController::class,'edit'])->name('admin_video_edit');
    Route::put('/video-gallery/{video}',[AdminVideoController::class,'update'])->name('admin_video_update');
    Route::delete('/video-gallery/{video}',[AdminVideoController::class,'destroy'])->name('admin_video_destroy');

    // FAQ routes
    Route::get('/faq',[AdminFaqController::class,'index'])->name('admin_faq_index');
    Route::get('/faq/create',[AdminFaqController::class,'create'])->name('admin_faq_create');
    Route::post('/faq',[AdminFaqController::class,'store'])->name('admin_faq_store');
    Route::get('/faq/{faq}',[AdminFaqController::class,'show'])->name('admin_faq_show');
    Route::get('/faq/{faq}/edit',[AdminFaqController::class,'edit'])->name('admin_faq_edit');
    Route::put('/faq/{faq}',[AdminFaqController::class,'update'])->name('admin_faq_update');
    Route::delete('/faq/{faq}',[AdminFaqController::class,'destroy'])->name('admin_faq_destroy');

    // Testimonial routes
    Route::get('/testimonials',[AdminTestimonialController::class,'index'])->name('admin_testimonial_index');
    Route::get('/testimonials/create',[AdminTestimonialController::class,'create'])->name('admin_testimonial_create');
    Route::post('/testimonials',[AdminTestimonialController::class,'store'])->name('admin_testimonial_store');
    Route::get('/testimonials/{testimonial}/edit',[AdminTestimonialController::class,'edit'])->name('admin_testimonial_edit');
    Route::put('/testimonials/{testimonial}',[AdminTestimonialController::class,'update'])->name('admin_testimonial_update');
    Route::delete('/testimonials/{testimonial}',[AdminTestimonialController::class,'destroy'])->name('admin_testimonial_destroy');

    // Post routes
    Route::get('/posts',[AdminPostController::class,'index'])->name('admin_post_index');
    Route::get('/posts/create',[AdminPostController::class,'create'])->name('admin_post_create');
    Route::post('/posts',[AdminPostController::class,'store'])->name('admin_post_store');
    Route::get('/posts/{post}/edit',[AdminPostController::class,'edit'])->name('admin_post_edit');
    Route::put('/posts/{post}',[AdminPostController::class,'update'])->name('admin_post_update');
    Route::delete('/posts/{post}',[AdminPostController::class,'destroy'])->name('admin_post_destroy');

    // Package routes
    Route::get('/packages',[AdminPackageController::class,'index'])->name('admin_package_index');
    Route::post('/packages',[AdminPackageController::class,'store'])->name('admin_package_store');
    Route::put('/packages/{package}',[AdminPackageController::class,'update'])->name('admin_package_update');
    Route::delete('/packages/{package}',[AdminPackageController::class,'destroy'])->name('admin_package_destroy');

    // Package Facility routes
    Route::get('/package-facilities',[AdminPackageController::class,'facilityIndex'])->name('admin_package_facility_index');
    Route::post('/package-facilities',[AdminPackageController::class,'facilityStore'])->name('admin_package_facility_store');
    Route::put('/package-facilities/{facility}',[AdminPackageController::class,'facilityUpdate'])->name('admin_package_facility_update');
    Route::delete('/package-facilities/{facility}',[AdminPackageController::class,'facilityDestroy'])->name('admin_package_facility_destroy');

    // Sponsor Category routes
    Route::get('/sponsor-categories',[SponsorCategoryController::class,'index'])->name('admin_sponsor_categories_index');
    Route::get('/sponsor-categories/create',[SponsorCategoryController::class,'create'])->name('admin_sponsor_categories_create');
    Route::post('/sponsor-categories',[SponsorCategoryController::class,'store'])->name('admin_sponsor_categories_store');
    Route::get('/sponsor-categories/{sponsorCategory}/edit',[SponsorCategoryController::class,'edit'])->name('admin_sponsor_categories_edit');
    Route::put('/sponsor-categories/{sponsorCategory}',[SponsorCategoryController::class,'update'])->name('admin_sponsor_categories_update');
    Route::delete('/sponsor-categories/{sponsorCategory}',[SponsorCategoryController::class,'destroy'])->name('admin_sponsor_categories_destroy');
});
Route::prefix('admin')->group(function () {
    Route::get('/', function () {return redirect('/admin/login');});
    Route::get('/login',[AdminAuthController::class,'login'])->name('admin_login');
    Route::post('/login',[AdminAuthController::class,'login_submit'])->name('admin_login_submit');
    Route::get('/logout',[AdminAuthController::class,'logout'])->name('admin_logout');
    Route::get('/forget-password',[AdminAuthController::class,'forget_password'])->name('admin_forget_password');
    Route::post('/forget_password_submit',[AdminAuthController::class,'forget_password_submit'])->name('admin_forget_password_submit');
    Route::get('/reset-password/{token}/{email}',[AdminAuthController::class,'reset_password'])->name('admin_reset_password');
    Route::post('/reset-password/{token}/{email}',[AdminAuthController::class,'reset_password_submit'])->name('admin_reset_password_submit');
});
