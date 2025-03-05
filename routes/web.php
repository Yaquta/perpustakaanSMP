<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\RentFormsController;
use Illuminate\Support\Facades\Storage;
use App\Models\Anggota;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');



Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticating']);
Route::get('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


Route::get('dashboard', [DashboardController::class,'index' ])->middleware('auth');

Route::get('books', [BookController::class,'index' ])->middleware('auth');
Route::get('book-add', [BookController::class,'add' ])->middleware('auth');
Route::post('book-add', [BookController::class,'store' ])->middleware('auth');
Route::get('book-edit/{slug}', [BookController::class,'edit' ])->middleware('auth');
Route::post('book-edit/{slug}', [BookController::class,'update' ])->middleware('auth');
Route::get('book-delete/{slug}', [BookController::class,'delete' ])->middleware('auth');
Route::get('book-destroy/{slug}', [BookController::class,'destroy' ])->middleware('auth');
Route::get('book-deleted', [BookController::class,'deletedBook' ])->middleware('auth');
Route::get('book-restore/{slug}', [BookController::class,'restore' ])->middleware('auth');

Route::get('/cover/{filename}', function ($filename) {
    $path = storage_path('app/private/cover/' . $filename);
    
    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->middleware('auth'); // Opsional: agar hanya user tertentu yang bisa mengakses



Route::get('categories', [CategoryController::class,'index' ])->middleware('auth');
Route::get('category-add', [CategoryController::class,'add' ])->middleware('auth');
Route::post('category-add', [CategoryController::class,'store' ])->middleware('auth');
Route::get('category-edit/{slug}', [CategoryController::class,'edit' ])->middleware('auth');
Route::put('category-update/{slug}', [CategoryController::class,'update' ])->middleware('auth');
Route::get('category-delete/{slug}', [CategoryController::class,'delete' ])->middleware('auth');
Route::get('category-destroy/{slug}', [CategoryController::class,'destroy' ])->middleware('auth');
Route::get('category-deleted', [CategoryController::class,'deletedCategory' ])->middleware('auth');
Route::get('category-restore/{slug}', [CategoryController::class,'restore' ])->middleware('auth');

Route::get('members', [MemberController::class,'index' ])->middleware('auth');

Route::get('anggotas', [AnggotaController::class,'index' ])->middleware('auth')->name('anggota.index');
Route::get('anggota-add', [AnggotaController::class,'add' ])->middleware('auth');
Route::post('anggota-store', [AnggotaController::class,'store'])->middleware('auth');
Route::get('anggota-edit/{anggota}', [AnggotaController::class,'edit'])->middleware('auth')->name('anggota.edit');
Route::put('anggota-update/{anggota}', [AnggotaController::class,'update'])->middleware('auth')->name('anggota.update') ;
Route::get('anggota-destroy/{anggota}', [AnggotaController::class,'destroy'])->middleware('auth')->name('anggota.destroy') ;
Route::get('anggota-delete/{anggota}', [AnggotaController::class,'delete'])->middleware('auth')->name('anggota.delete') ;
Route::get('anggota-deleted-list',[AnggotaController::class,'deletedAnggota'])->middleware('auth')->name('anggota.deletedList') ;
Route::get('anggota-restore/{slug}',[AnggotaController::class,'restore'])->middleware('auth')->name('anggota.restore');

Route::get('rent-logs', [RentLogController::class,'index' ])->middleware('auth');

Route::get('rent-forms', [RentFormsController::class,'index' ])->middleware('auth');
Route::get('rent-forms-detail/{anggota}', [RentFormsController::class,'rentForms'])->middleware('auth')->name('rentforms.detail');
Route::post('rent-forms-submit', [RentFormsController::class,'store'])->middleware('auth')->name('rentforms.submit');