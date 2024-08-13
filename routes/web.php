<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\infoController;
use App\Http\Controllers\mailController;
use App\Http\Controllers\NhaTuyenDungController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\UngVienController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuthenticate;
use App\Http\Middleware\notAdminandNTDMiddleware;
use App\Http\Middleware\NTDAuthenticate;
use App\Http\Middleware\UVAuthenticate;
// Authentication
Route::get('/login', [AuthController::class,'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class,'login'])->middleware('guest');
Route::get('/register', [AuthController::class,'showRegister'])->middleware('guest');
Route::post('/register', [AuthController::class,'register']);
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');
Route::get('/verifyEmail', [AuthController::class, 'verifyEmail']);
Route::post('/verifyEmail', [AuthController::class, 'postVerifyEmail']);


// Admin Page
//Company
Route::get('/admin', [AdminController::class,'index'])->middleware(AdminAuthenticate::class);
Route::get('/admin/taikhoanntd',[AdminController::class,'AccountNTD'])->middleware(AdminAuthenticate::class);
Route::get('/admin/taikhoanuv',[AdminController::class, 'AccountUV'])->middleware(AdminAuthenticate::class);
Route::get('/admin/listCompany',[AdminController::class, 'getListCompany'])->middleware(AdminAuthenticate::class);
Route::get('/admin/insertCompany', [AdminController::class, 'create'])->middleware(AdminAuthenticate::class);
Route::post('/admin/insertCompany', [AdminController::class, 'store'])->middleware(AdminAuthenticate::class);
Route::get('/admin/editCompany/{id}', [AdminController::class, 'editFormCompany'])->middleware(AdminAuthenticate::class);
Route::post('/admin/editCompany/{id}', [AdminController::class, 'editCompany'])->middleware(AdminAuthenticate::class);
Route::delete('/admin/destroy/{company}', [AdminController::class, 'destroy'])->middleware(AdminAuthenticate::class);
//News
Route::get('/admin/listNews', [AdminController::class, 'getListNews'])->middleware(AdminAuthenticate::class);
Route::get('/admin/insertNews', [AdminController::class, 'createNews'])->middleware(AdminAuthenticate::class);
Route::post('/admin/insertNews', [AdminController::class, 'storeNews'])->middleware(AdminAuthenticate::class);
Route::get('/admin/editNews/{id}', [AdminController::class, 'editFormNews'])->middleware(AdminAuthenticate::class);
Route::post('/admin/editNews/{id}', [AdminController::class, 'editNews'])->middleware(AdminAuthenticate::class);
Route::delete('/admin/destroyNews/{news}', [AdminController::class, 'destroyNews'])->middleware(AdminAuthenticate::class);
//Account
Route::get('/admin/listAccount', [AdminController::class, 'getListAccount'])->middleware(AdminAuthenticate::class);
Route::get('/admin/listAccountNTD', [AdminController::class, 'getListNTD'])->middleware(AdminAuthenticate::class);
Route::get('/admin/listAccountUV', [AdminController::class, 'getListUV'])->middleware(AdminAuthenticate::class);
Route::get('/admin/insertAccount', [AdminController::class, 'insertFormAccount'])->middleware(AdminAuthenticate::class);
Route::post('/admin/insertAccount', [AdminController::class, 'register'])->middleware(AdminAuthenticate::class);
Route::get('/admin/editAccount/{id}', [AdminController::class, 'editFormAccount'])->middleware(AdminAuthenticate::class);
Route::post('/admin/editAccount/{id}', [AdminController::class, 'editAccount'])->middleware(AdminAuthenticate::class);
Route::delete('/admin/destroyAccount/{user}', [AdminController::class, 'destroyAccount'])->middleware(AdminAuthenticate::class);
//Jobs
Route::get('/admin/listJobs', [AdminController::class, 'listJobs'])->middleware(AdminAuthenticate::class);;
Route::get('/admin/listJobsWait', [AdminController::class, 'listJobsWait'])->middleware(AdminAuthenticate::class);;
Route::get('/admin/acceptJob/{id}', [AdminController::class, 'acceptJob'])->middleware(AdminAuthenticate::class);;
Route::delete('/admin/deleteJob/{job}', [AdminController::class, 'deleteJob'])->middleware(AdminAuthenticate::class);;
//Form
Route::get('/admin/formUpdate', [AdminController::class, 'formUpdate'])->middleware(AdminAuthenticate::class);;



// NhaTuyenDung Page
Route::get('/NhaTuyenDung', [ NhaTuyenDungController::class,'index'])->middleware(NTDAuthenticate::class);
Route::get('/NhaTuyenDung/postJob', [NhaTuyenDungController::class, 'showFormPostJob'])->middleware(NTDAuthenticate::class);
Route::post('/NhaTuyenDung/postJob', [NhaTuyenDungController::class, 'postJob'])->middleware(NTDAuthenticate::class);
Route::get('/NhaTuyenDung/listJob', [NhaTuyenDungController::class, 'getListJob'])->middleware(NTDAuthenticate::class);
Route::get('/NhaTuyenDung/listJobWait', [NhaTuyenDungController::class, 'getListJobWait'])->middleware(NTDAuthenticate::class);
Route::get('/NhaTuyenDung/editJob/{id}', [NhaTuyenDungController::class, 'editFormJob'])->middleware(NTDAuthenticate::class);
Route::post('/NhaTuyenDung/editJob/{id}', [NhaTuyenDungController::class, 'editJob'])->middleware(NTDAuthenticate::class);
Route::delete('/NhaTuyenDung/destroyJob/{job}', [NhaTuyenDungController::class, 'destroyJob'])->middleware(NTDAuthenticate::class);

Route::get('/NhaTuyenDung/listUV', [NhaTuyenDungController::class, 'getListUV'])->middleware(NTDAuthenticate::class);
Route::get('/NhaTuyenDung/listCV/{id}', [NhaTuyenDungController::class, 'getListCV'])->middleware(NTDAuthenticate::class);
Route::get('/NhaTuyenDung/downloadCV',[NhaTuyenDungController::class, 'downloadCV'])->middleware(NTDAuthenticate::class);
Route::delete('NhaTuyenDung/deleteCVNTD', [NhaTuyenDungController::class, 'deleteCV'])->middleware(NTDAuthenticate::class);
Route::post('NhaTuyenDung/acceptCV', [mailController::class, 'acceptCV'])->middleware(NTDAuthenticate::class);

Route::get('/NhaTuyenDung/downloadForm', [NhaTuyenDungController::class, 'downloadFormPage'])->middleware(NTDAuthenticate::class);
Route::get('/NhaTuyenDung/taixuong', [NhaTuyenDungController::class, 'downloadExcel'])->middleware(NTDAuthenticate::class);
Route::post('/NhaTuyenDung/uploadJobData', [NhaTuyenDungController::class, 'importExcelData'])->middleware(NTDAuthenticate::class);

// UngVien Page
Route::get('/', [UngVienController::class, 'index'])->middleware(notAdminandNTDMiddleware::class);
Route::get('/detailJob/{id}', [UngVienController::class, 'detailJob']);
Route::get('/applyNow/{id}', [UngVienController::class, 'applyForm'])->middleware(UVAuthenticate::class);
Route::post('/applyNow/{id}', [UngVienController::class, 'apply'])->middleware(UVAuthenticate::class);
Route::get('/company', [UngVienController::class, 'companyShow'])->middleware(notAdminandNTDMiddleware::class);
Route::get('/news', [UngVienController::class, 'newsShow'])->middleware(notAdminandNTDMiddleware::class);
Route::get('/listCV/{id}', [UngVienController::class, 'getListCV'])->middleware(UVAuthenticate::class);
Route::delete('/deleteCV', [UngVienController::class, 'deleteCV'])->middleware(UVAuthenticate::class);

//info
Route::get('/profile', [infoController::class, 'profile'])->middleware('auth');
Route::get('/editProfile', [infoController::class, 'editFormProfile'])->middleware('auth');
Route::post('/editProfile', [infoController::class, 'editProfile'])->middleware('auth');
Route::get('/doiMatKhau', [infoController::class, 'changeFormPassword']);
Route::post('/doiMatKhau', [infoController::class, 'changePassword']);

//mail
Route::get('/quenMatKhau', [mailController::class, 'forgotPassword']);
Route::post('/quenMatKhau', [mailController::class, 'postEmail']);
Route::get('/vertifyCode', [mailController::class, 'vertifyCode']);
Route::post('/vertifyCode', [mailController::class, 'postVertifyCode']);

//search
Route::get('/timKiem', [searchController::class, 'search']);
Route::get('/timKiem/filter', [searchController::class, 'searchFilter']);

