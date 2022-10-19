<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pasloncontroller;
use App\Http\Controllers\votingcontroller;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\tokencontroller;
use App\Http\Controllers\waktucontroller;
use App\Http\Controllers\userdatacontroller;
use App\Http\Controllers\kelascontroller;

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

Route::get('/', function () {
    return view('auth.userlogin');
})->name('userlogin');



Route::get('admin', function () {
    return view('auth.login');
});

Route::controller(tokencontroller::class)->group(function () {
    Route::post('login_user', 'store')->name('token.store');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('paslon', pasloncontroller::class);
    Route::resource('waktu', waktucontroller::class);
    Route::controller(userdatacontroller::class)->group(function () {
        Route::get('User', 'index')->name('User.index');
        Route::get('User/create', 'create')->name('User.create');
        Route::get('User/export', 'export')->name('User.export');
        Route::post('User/import', 'import')->name('User.import');
        Route::post('User', 'store')->name('User.store');
        Route::get('User/edit/{id}', 'edit')->name('User.edit');
        Route::patch('User/updaste/{id}', 'update')->name('User.update');
        Route::delete('User/delete/{id}', 'destroy')->name('User.delete');
        Route::get('User/print/{id}', 'print')->name('User.print');
        Route::get('User/printsemua', 'printall')->name('User.printall');
        Route::get('print/laporan/siswa/tidak/memilih', 'printlaporan')->name('print.laporan.golput');
        Route::resource('kelas', kelascontroller::class);


        Route::get('/laporan', function () {
            return view('admin.laporan.laporan');
        })->name('laporan.index');


        Route::get('/printlaporan', function () {
            return view('admin.laporan.printlaporan');
        })->name('print.laporan');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::middleware(['admin'])->group(function () {
Route::controller(votingcontroller::class)->group(function () {
    Route::get('home', 'index')->name('user.home');
    Route::post('home/input', 'store')->name('user.store');
    Route::post('home/golput', 'golput')->name('user.golput');
    // Route::get('home/test', 'test');
});
// });

require __DIR__ . '/auth.php';
