<?php

use App\Models\Service;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\CallController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EstimationController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\NewRequestController;
use App\Http\Controllers\MailController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // log out

Route::get('/landing' , [MainController::class,'landing'])->name('landing');

Route::get('/' , [MainController::class,'index'])->name('main');
Route::get('genaral' , [MainController::class,'genaral'])->name('genaral');

Route::post('/create_user', [UserController::class, 'create_user'])->name('create_user');
Route::post('/update_user/{id}', [UserController::class, 'update_user'])->name('update_user');
Route::get('/delete_user/{id}', [UserController::class, 'delete_user'])->name('delete_user');

//Client signup
Route::post('/storeclient', [UserController::class, 'storeclient'])->name('storeclient');


Route::get('/profile' , [ProfileController::class,'index'])->name('profile');


Route::get('/payments' , [PaymentController::class,'index'])->name('payments');

Route::get('/jobs' , [JobController::class,'index'])->name('jobs');

Route::get('/create_report' , [ReportController::class,'index'])->name('create_report');

Route::get('/create_request' , [RequestController::class,'index'])->name('create_request');
Route::post('/create_req' , [RequestController::class,'create_request'])->name('create_req');


Route::get('/view_request' , [RequestController::class,'view_request'])->name('view_request');


Route::get('/view_job_request-{id}' , [RequestController::class,'view_request'])->name('view_job_request');

Route::get('/contact' , [ContactController::class,'index'])->name('contact');

Route::get('/about' , [ContactController::class,'about'])->name('about');

Route::get('/estimation' , [EstimationController::class,'index'])->name('estimation');
Route::post('/save_estimation' , [EstimationController::class,'save_estimation'])->name('save_estimation');
Route::get('/delete_estimation/{id}', [EstimationController::class, 'delete_estimation'])->name('delete_estimation');

Route::get('/shedule_call' , [ScheduleController::class,'index'])->name('shedule_call');

Route::get('schedule' , [ScheduleController::class,'index'])->name('schedule');
Route::post('/add_schedule' , [ScheduleController::class,'add_schedule'])->name('add_schedule'); 
Route::get('/delete_schedule/{id}', [ScheduleController::class, 'delete_schedule'])->name('delete_schedule');

Route::get('service' , [AdminServiceController::class,'index'])->name('service');



// admin routs

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminEstimationController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminEmployeeController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\FileUploadController;

Route::get('/admin_profile' , [AdminController::class,'adminprofile'])->name('admin_profile');

Route::get('/admin_login' , [AdminController::class,'index'])->name('admin_login'); 
Route::post('/admin_login', [AdminController::class, 'admin_login']);
Route::post('/admin_logout', [AdminController::class, 'admin_logout'])->name('admin_logout');

// client signup page view 
Route::get('/admin_client_signup' , [AdminController::class,'admin_client_signup'])->name('admin_client_signup'); 

// admin signup page view 
Route::get('/admin_admin_signup' , [AdminController::class,'admin_admin_signup'])->name('admin_admin_signup'); 

//admin signup
Route::post('/adminsignup', [AdminController::class, 'adminsignup'])->name('adminsignup');





Route::get('/getNotifications' , [AdminController::class,'getNotifications'])->name('getNotifications'); 

Route::get('/admin_home' , [AdminHomeController::class,'index'])->name('admin_home'); 
//pagination get data
Route::get('/get-admin-data', [AdminHomeController::class, 'getData'])->name('get-admin-data');

Route::get('admin_signup' , [AdminController::class,'admin_signup'])->name('admin_signup'); 

Route::get('admin_view_request' , [AdminController::class,'admin_view_request'])->name('admin_view_request'); 

Route::get('estimation_view' , [AdminEstimationController::class,'index'])->name('estimation_view'); 

Route::get('employee' , [AdminEmployeeController::class,'index'])->name('employee'); 
Route::post('create_employee' , [AdminEmployeeController::class,'create_employee'])->name('create_employee'); 
Route::post('/update_emp/{id}', [AdminEmployeeController::class, 'update_emp'])->name('update_emp'); 
Route::get('/delete_emp/{id}', [AdminEmployeeController::class, 'delete_emp'])->name('delete_emp');

Route::get('service' , [AdminServiceController::class,'index'])->name('service');
Route::post('add_service' , [AdminServiceController::class,'add_service'])->name('add_service');
Route::get('/delete_service/{id}', [AdminServiceController::class, 'delete_service'])->name('delete_service');

Route::get('admin_schedule' , [ScheduleController::class,'index'])->name('admin_schedule');

Route::get('/jobs-{id}', [AdminController::class, 'admin_view_request'])->name('edit_jobs');
// Route to handle the update request
Route::post('/jobs-{id}', [AdminController::class, 'update'])->name('jobs_update');



Route::get('/', function () {
    $services = Service::get();
    return view('index', ['services' => $services]);
 });


 Route::get('/file-upload', [FileUploadController::class, 'index'])->name('fileupload.index');
 Route::post('/multiple-file-upload', [FileUploadController::class, 'multipleUpload'])->name('multiple.fileupload');


Route::post('/mark-notifications-read', [AdminController::class, 'markNotificationsRead'])->name('mark.notifications.read');


Route::post('/mark-updatenotifications-read', [AdminController::class, 'markupdateNotificationsRead'])->name('mark.updatenotifications.read');



//  Route::get('/admin_home/search' , [AdminHomeController::class,'search'])->name('admin_home');
 //Route::post('/create_req', [NewRequestController::class, 'store'])->name('create_req');


//upload file  view
Route::get('/view/{id}', [AdminController::class, 'view'])->name('view'); 


//client 
//pagination get data
Route::get('/get-data', [RequestController::class, 'getData'])->name('get-data');
 


