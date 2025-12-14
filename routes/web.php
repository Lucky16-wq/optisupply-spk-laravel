<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpkController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\AlternativeController;

Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/login', [AuthController::class,'login'])->name('login.post');
Route::post('/logout', [AuthController::class,'logout'])->name('logout');

Route::middleware(['auth.custom'])->group(function () {
    Route::get('/', [SpkController::class,'index'])->name('spk.index');
    Route::get('/spk/calculate', [SpkController::class,'calculate'])->name('spk.calculate');
    Route::get('/spk/top5', [SpkController::class,'top5'])->name('spk.top5');
    Route::get('/spk/show/{id}', [SpkController::class,'show'])->name('spk.show');

    Route::resource('criteria', CriteriaController::class);
    Route::resource('alternatives', AlternativeController::class);
});
