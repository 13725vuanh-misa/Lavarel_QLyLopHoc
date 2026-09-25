<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\LopHocController;

Route::get('/', function () {
    return view('welcome');
}); 

// Route::get('/sinhvien', function () {
//    return view('sinhvien.index');
//});

Route::get('/sinhvien',[SinhVienController::class, 'index']);

//Route::get('/sinhvien/show/{id?}',[SinhVienController::class, 'getID'])->where('id', '[0-9]+');
//Route::get('/sinhvien/show2/{name?}/{tuoi?}',[SinhVienController::class, 'show2'])->where('tuoi', '[0-9]+');
//Route::get('/sinhvien/add',[SinhVienController::class, 'add']);

Route::prefix('sinhvien')->group(function(){
    Route::get('/show/{id?}',[SinhVienController::class, 'getID'])->where('id', '[0-9]+');
    Route::get('/show2/{name?}/{tuoi?}',[SinhVienController::class, 'show2'])->where('tuoi', '[0-9]+');
    Route::get('/add',[SinhVienController::class, 'add']);
});

Route::post('/sinhvien',[SinhVienController::class, 'store'])->name('sinhvien.store');

Route::get('/lop-hocs', [LopHocController::class, 'index']);
Route::get('/lop-hocs/create', [LopHocController::class, 'create'])->name('lop-hocs.create');
Route::post('/lop-hocs/store', [LopHocController::class, 'store'])->name('lop-hocs.store');
Route::resource('lop-hocs', LopHocController::class);