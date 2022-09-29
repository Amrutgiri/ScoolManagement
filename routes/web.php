<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\InwardsController;
use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\Admin\CalenderController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\StandardController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LetterpadController;
use App\Http\Controllers\Admin\AchivementController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\ManageschoolController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\SchoolconfigController;

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

Route::get('/',[FrontendController::class,'index']); 
    


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//all Frontend Routes
Route::get('oneview/{id}',[FrontendController::class,'oneview']);
Route::get('achive/{id}',[FrontendController::class,'achive']);

Route::prefix('student')->middleware(['auth','isStudent'])->group(function(){
    
    Route::get('dashboard',[App\Http\Controllers\Student\DashboardController::class,'index']);
});

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('dashboard',[DashboardController::class,'index']);
    // all Calender Routes
    Route::get('home',[CalenderController::class,'index']);
    
    //all School Info Routes
    Route::get('school_info',[WebsiteController::class,'index']);
    Route::post('Addschoolinfo',[WebsiteController::class,'store']);
    
    Route::get('carousel',[WebsiteController::class,'carousel']);
    Route::post('addcarousel',[WebsiteController::class,'addcarousel_store']);
    Route::get('editCarousel/{id}',[WebsiteController::class,'editCarousel']);
    Route::put('updatecarousel/{id}',[WebsiteController::class,'updatecarousel']);
    Route::get('deleteCarousel/{id}',[WebsiteController::class,'deleteCarousel']);

    Route::get('welcomesection',[WebsiteController::class,'welcomesection']);
    Route::post('sections/{id}',[WebsiteController::class,'section_store']);
   
    
    Route::get('achivements',[AchivementController::class,'index']);
    Route::get('add_achivement',[AchivementController::class,'create']);
    Route::post('store_achivement',[AchivementController::class,'store']);
    Route::get('edit_achivement/{id}',[AchivementController::class,'edit']);
    Route::put('Update_achivement/{id}',[AchivementController::class,'update']);
    Route::get('delete_achivement/{id}',[AchivementController::class,'delete']);

    Route::get('gallery',[GalleryController::class,'index']);
    Route::post('create_albume',[GalleryController::class,'create_albume']);
    Route::get('gallery/upload_view/{id}',[GalleryController::class,'upload_view']);
    Route::post('store_multiple',[GalleryController::class,'store_multiple']);

    Route::get('feedback',[FeedbackController::class,'index']);
    Route::post('addfeedback',[FeedbackController::class,'store']);
    Route::get('editfeedback/{id}',[FeedbackController::class,'edit']);
    Route::put('updatefeedback/{id}',[FeedbackController::class,'update']);
    Route::get('deletefeedback/{id}',[FeedbackController::class,'delete']);

    Route::get('createpages',[PagesController::class,'index']);
    Route::get('addpages',[PagesController::class,'create']);
    Route::post('store_pages',[PagesController::class,'store']);
    Route::get('edit_pages/{id}',[PagesController::class,'edit']);
    Route::put('update_pages/{id}',[PagesController::class,'update']);
    Route::get('delete_pages/{id}',[PagesController::class,'delete']);

    //All Notification 
    Route::get('notifications',[NotificationController::class,'index']);
    Route::post('addnotification',[NotificationController::class,'store']);
    Route::get('editnotif/{id}',[NotificationController::class,'edit']);
    Route::get('updatenotification/{id}',[NotificationController::class,'update']);
    // Route::get('deletenotification/{id}',[NotificationController::class,'delete']);

    //All School Manage Routes
    Route::get('manageschool',[ManageschoolController::class,'index']);
    
    //branch 
    Route::get('mananebranch',[BranchController::class,'index']);
    Route::post('add_branch',[BranchController::class,'store']);
    Route::get('edit_branch/{id}',[BranchController::class,'edit']);
    Route::get('update_branch/{id}',[BranchController::class,'update']);
    Route::get('delete_branch/{id}',[BranchController::class,'delete']);

    //standard
    Route::get('standard/{id}',[StandardController::class,'index']);
    Route::post('add_standard',[StandardController::class,'store']);
    Route::get('edit_standard/{id}',[StandardController::class,'edit']);
    Route::get('update_standard/{id}',[StandardController::class,'update']);
    Route::get('delete_standard/{id}',[StandardController::class,'delete']);

    //Division
    Route::get('division/{id}',[DivisionController::class,'index']);
    Route::post('add_division',[DivisionController::class,'store']);
    Route::get('edit_division/{id}',[DivisionController::class,'edit']);
    Route::get('update_division/{id}',[DivisionController::class,'update']);

    //letterpad
    Route::get('letterpad',[LetterpadController::class,'index']);
    Route::get('add_letterpad',[LetterpadController::class,'create']);
    Route::post('store_letterpad',[LetterpadController::class,'store']);
    Route::get('edit_letterpad/{id}',[LetterpadController::class,'edit']);
    Route::get('update_letterpad/{id}',[LetterpadController::class,'update']);
    Route::get('delete_letterpad/{id}',[LetterpadController::class,'delete']);
    Route::get('generatePDF/{id}',[LetterpadController::class,'generatePDF']);
    Route::get('view_report',[LetterpadController::class,'view_report']);
    
    //Inwards Controller
    Route::get('inwards',[InwardsController::class,'index']);
    Route::post('add_inwards',[InwardsController::class,'store']);
    Route::get('edit_inward/{id}',[InwardsController::class,'edit']);
    Route::get('update_inwards/{id}',[InwardsController::class,'update']);
    Route::get('delete_inward/{id}',[InwardsController::class,'delete']);

    //school config
    Route::get('schoolconfig',[SchoolconfigController::class,'index']);
    Route::post('add_school',[SchoolconfigController::class,'store']);

    //Staff Manage
    Route::get('staff',[StaffController::class,'index']);
    Route::get('add_staff',[StaffController::class,'create']);
    Route::post('store_staff',[StaffController::class,'store']);
    Route::get('edit_staff/{id}',[StaffController::class,'edit']);
    Route::get('update_staff/{id}',[StaffController::class,'update']);

    //Designation
    Route::get('designation',[DesignationController::class,'index']);
    Route::post('add_designation',[DesignationController::class,'store']);
    Route::get('edit_designation/{id}',[DesignationController::class,'edit']);
    Route::put('update_designation/{id}',[DesignationController::class,'update']);
});

//