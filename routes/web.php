<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Admin\Information\InformationController;
use App\Http\Controllers\Admin\ServiceProvides\ServiceController;
use App\Http\Controllers\Admin\Projects\ProjectController;
use App\Http\Controllers\Admin\Courses\CoursesController;
use App\Http\Controllers\Admin\HomeETC\HomePageEtcController;
use App\Http\Controllers\Admin\Review\ClientReviewController;
use App\Http\Controllers\Admin\Footer\FooterController;
use App\Http\Controllers\Admin\Chart\ChartController;
use App\Http\Controllers\Admin\Contact\ContactController;
use Illuminate\Support\Facades\Auth;

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

// Auth::routes(['register' => false]);   // It will work for laravel ui

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/logout', [AdminUserController::class, 'adminLogout'])->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/profile', [AdminUserController::class, 'userProfile'])->name('user.profile');

    Route::get('/profile-edit', [AdminUserController::class, 'userProfileEdit'])->name('user.profile.edit');

    Route::post('/profile-store', [AdminUserController::class, 'userProfileStore'])->name('user.profile.store');

    Route::get('/change-password', [AdminUserController::class, 'userChangePassword'])->name('change.password');

    Route::post('/password-update', [AdminUserController::class, 'userPasswordUpdate'])->name('change.password.update');

    // Information All Routes 
    Route::prefix('information')->group(function () {

        Route::get('/all', [InformationController::class, 'allInformations'])->name('all.information');

        Route::get('/add', [InformationController::class, 'addInformation'])->name('add.information');

        Route::post('/store', [InformationController::class, 'storeInformation'])->name('information.store');

        Route::get('/edit/{id}', [InformationController::class, 'editInformation'])->name('edit.information');

        Route::post('/update/{id}', [InformationController::class, 'updateInformation'])->name('information.update');

        Route::get('/delete/{id}', [InformationController::class, 'deleteInformation'])->name('delete.information');
    });

    // Services All Routes 
    Route::prefix('service')->group(function () {

        Route::get('/all', [ServiceController::class, 'allServices'])->name('all.services');

        Route::get('/add', [ServiceController::class, 'addService'])->name('add.services');

        Route::post('/store', [ServiceController::class, 'storeService'])->name('service.store');

        Route::get('/edit/{id}', [ServiceController::class, 'editService'])->name('edit.service');

        Route::post('/update', [ServiceController::class, 'updateService'])->name('service.update');

        Route::get('/delete/{id}', [ServiceController::class, 'deleteService'])->name('delete.service');
    });


    // Project All Routes 
    Route::prefix('project')->group(function () {

        Route::get('/all', [ProjectController::class, 'allProjects'])->name('all.projects');

        Route::get('/add', [ProjectController::class, 'addProject'])->name('add.projects');

        Route::post('/store', [ProjectController::class, 'storeProject'])->name('project.store');

        Route::get('/edit/{id}', [ProjectController::class, 'editProject'])->name('edit.project');

        Route::post('/update', [ProjectController::class, 'updateProject'])->name('project.update');

        Route::get('/delete/{id}', [ProjectController::class, 'deleteProject'])->name('delete.project');
    });

    // Courses All Routes 
    Route::prefix('course')->group(function () {

        Route::get('/all', [CoursesController::class, 'allCourses'])->name('all.courses');

        Route::get('/add', [CoursesController::class, 'addCourses'])->name('add.courses');

        Route::post('/store', [CoursesController::class, 'storeCourses'])->name('courses.store');

        Route::get('/edit/{id}', [CoursesController::class, 'editCourses'])->name('edit.courses');

        Route::post('/update', [CoursesController::class, 'updateCourses'])->name('courses.update');

        Route::get('/delete/{id}', [CoursesController::class, 'deleteCourses'])->name('delete.courses');
    });


    // Home Content All Routes 
    Route::prefix('home')->group(function () {

        Route::get('/all', [HomePageEtcController::class, 'allHomeContents'])->name('all.home.content');

        Route::get('/add', [HomePageEtcController::class, 'addHomeContent'])->name('add.home.content');

        Route::post('/store', [HomePageEtcController::class, 'storeHomeContent'])->name('homecontent.store');

        Route::get('/edit/{id}', [HomePageEtcController::class, 'editHomeContent'])->name('edit.homecontent');

        Route::post('/update', [HomePageEtcController::class, 'updateHomeContent'])->name('homecontent.update');

        Route::get('/delete/{id}', [HomePageEtcController::class, 'deleteHomeContent'])->name('delete.homecontent');
    });


    // Client Review All Routes 
    Route::prefix('review')->group(function () {

        Route::get('/all', [ClientReviewController::class, 'allReviews'])->name('all.review');

        Route::get('/add', [ClientReviewController::class, 'addReview'])->name('add.review');

        Route::post('/store', [ClientReviewController::class, 'storeReview'])->name('review.store');

        Route::get('/edit/{id}', [ClientReviewController::class, 'editReview'])->name('edit.review');

        Route::post('/update', [ClientReviewController::class, 'updateReview'])->name('review.update');

        Route::get('/delete/{id}', [ClientReviewController::class, 'deleteReview'])->name('delete.review');
    });


    // Footer Content All Routes 
    Route::prefix('footer')->group(function () {
        Route::get('/add', [FooterController::class, 'addFooterContent'])->name('add.footer.content');

        Route::post('/store', [FooterController::class, 'storeFooterContent'])->name('footer.store');

        Route::get('/all', [FooterController::class, 'allFooterContents'])->name('all.footer.content');

        Route::get('/edit/{id}', [FooterController::class, 'editFooterContent'])->name('edit.footer');

        Route::post('/update', [FooterController::class, 'updateFooterContent'])->name('footer.update');

        Route::get('/delete/{id}', [ClientReviewController::class, 'deleteReview'])->name('delete.review');
    });


    // Chart Content All Routes 
    Route::prefix('chart')->group(function () {

        Route::get('/all', [ChartController::class, 'allChartContents'])->name('all.chart.content');

        Route::get('/edit/{id}', [ChartController::class, 'editChartContent'])->name('edit.chart');

        Route::post('/update', [ChartController::class, 'updateChartContent'])->name('chart.update');

        Route::get('/delete/{id}', [ClientReviewController::class, 'deleteReview'])->name('delete.review');
    });


    Route::get('/all', [ContactController::class, 'allContactMessages'])->name('contact.message');

    Route::get('/delete/message/{id}', [ContactController::class, 'deleteContactMessage'])->name('delete.message');
});
