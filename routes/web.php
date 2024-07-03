<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/movies/{id}', [HomeController::class, 'show'])->name('home.show');

Route::get('/about', [UserController::class, 'about'])->name('about');

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [UserController::class, 'userprofile'])->name('profile');
});

//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');

    Route::get('/admin/profile', [AdminController::class, 'profilepage'])->name('admin/profile');

    Route::get('/admin/movies', [MovieController::class, 'index'])->name('admin/movies');
    Route::get('/admin/movies/create', [MovieController::class, 'create'])->name('admin/movies/create');
    Route::post('/admin/movies/store', [MovieController::class, 'store'])->name('admin/movies/store');
    Route::get('/admin/movies/show/{id}', [MovieController::class, 'show'])->name('admin/movies/show');
    Route::get('/admin/movies/edit/{id}', [MovieController::class, 'edit'])->name('admin/movies/edit');
    Route::put('/admin/movies/edit/{id}', [MovieController::class, 'update'])->name('admin/movies/update');
    Route::delete('/admin/movies/destroy/{id}', [MovieController::class, 'destroy'])->name('admin/movies/destroy');

    Route::get('/admin/studios', [StudioController::class, 'index'])->name('admin/studios');
    Route::get('/admin/studios/create', [StudioController::class, 'create'])->name('admin/studios/create');
    Route::post('/admin/studios/store', [StudioController::class, 'store'])->name('admin/studios/store');
    Route::get('/admin/studios/show/{id}', [StudioController::class, 'show'])->name('admin/studios/show');
    Route::get('/admin/studios/edit/{id}', [StudioController::class, 'edit'])->name('admin/studios/edit');
    Route::put('/admin/studios/edit/{id}', [StudioController::class, 'update'])->name('admin/studios/update');
    Route::delete('/admin/studios/destroy/{id}', [StudioController::class, 'destroy'])->name('admin/studios/destroy');

    Route::get('/admin/seats', [SeatController::class, 'index'])->name('admin/seats');
    Route::get('/admin/seats/create', [SeatController::class, 'create'])->name('admin/seats/create');
    Route::post('/admin/seats/store', [SeatController::class, 'store'])->name('admin/seats/store');
    Route::get('/admin/seats/show/{id}', [SeatController::class, 'show'])->name('admin/seats/show');
    Route::get('/admin/seats/edit/{id}', [SeatController::class, 'edit'])->name('admin/seats/edit');
    Route::put('/admin/seats/edit/{id}', [SeatController::class, 'update'])->name('admin/seats/update');
    Route::delete('/admin/seats/destroy/{id}', [SeatController::class, 'destroy'])->name('admin/seats/destroy');

    Route::get('/admin/schedules', [ScheduleController::class, 'index'])->name('admin/schedules');
    Route::get('/admin/schedules/create', [ScheduleController::class, 'create'])->name('admin/schedules/create');
    Route::post('/admin/schedules/store', [ScheduleController::class, 'store'])->name('admin/schedules/store');
    Route::get('/admin/schedules/show/{id}', [ScheduleController::class, 'show'])->name('admin/schedules/show');
    Route::get('/admin/schedules/edit/{id}', [ScheduleController::class, 'edit'])->name('admin/schedules/edit');
    Route::put('/admin/schedules/edit/{id}', [ScheduleController::class, 'update'])->name('admin/schedules/update');
    Route::delete('/admin/schedules/destroy/{id}', [ScheduleController::class, 'destroy'])->name('admin/schedules/destroy');

    Route::resource('bookings', BookingController::class);
    Route::get('payments/create/{bookingId}', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('payments/store', [PaymentController::class, 'store'])->name('payments.store');

});
