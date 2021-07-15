<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HoroscopeController;
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

Route::get('/',[HoroscopeController::class, 'generateHoroscope'])->name('Home');
Route::get('generate-horoscope',[HoroscopeController::class, 'generateHoroscope'])->name('GenerateHoroscope');
Route::post('save-horoscope',[HoroscopeController::class, 'saveHoroscope'])->name('SaveHoroscope');


Route::get('/horoscope',[HoroscopeController::class, 'horoscope'])->name('Horoscope.get');
Route::post('/horoscope',[HoroscopeController::class, 'horoscope'])->name('Horoscope.post');

Route::get('generate-horoscope-message',[HoroscopeController::class, 'horoscope'])->name('HoroscopeMessage.get');
Route::post('generate-horoscope-message',[HoroscopeController::class, 'horoscope'])->name('HoroscopeMessage.post');



Route::get('best-month',[HoroscopeController::class, 'bestMonth'])->name('BestMonth.get');
Route::post('best-month',[HoroscopeController::class, 'bestMonth'])->name('BestMonth.post');

Route::get('best-year',[HoroscopeController::class, 'bestYear'])->name('BestYear.get');
Route::post('best-year',[HoroscopeController::class, 'bestYear'])->name('BestYear.post');