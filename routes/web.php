<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ExtraviadoController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\Auth\RegisterController;
use App\Mail\MailBox;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('empleado',EmpleadoController::class)->middleware('auth');
Route::resource('reporte',ExtraviadoController::class);


Auth::routes(['reset'=>false]);

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::post('/sendEmail', [MailController::class, 'sendMail'])->name('sendMail');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});
