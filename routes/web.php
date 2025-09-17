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

// Front
Route::get('/', [FrontController::class, 'home'])->name('front.home');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');
Route::post('/contact', [FrontController::class, 'contact_submit'])->name('contact.submit');
Route::get('/speakers', [FrontController::class, 'speakers'])->name('front.speakers');
Route::get('/speaker/{slug}', [FrontController::class, 'speaker'])->name('front.speaker');
Route::get('/schedule', [FrontController::class, 'schedule'])->name('front.schedule');

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
