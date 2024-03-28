<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingsController;
use Illuminate\Support\Facades\Route;
use App\Models\Courses;
use App\Models\User;
use App\Models\Bookings;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user->role === 'admin') {
        $users = User::all();
        $courses = Courses::all();
        $bookings = Bookings::all();
        return view('dashboard_admin', ['users' => $users, 'courses' => $courses, 'bookings' => $bookings]);
    } else {
        $courses = Courses::all();
        
        return view('dashboard', ['courses' => $courses]);
    }
})->middleware(['auth','verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/course/{id}', function ($id) {
    $course = Courses::findOrFail($id);
    return view('courses_detail', ['course' => $course]);
})->name('courses_detail');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/bookings/create/{course_id}', [BookingsController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingsController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{bookings}', [BookingsController::class, 'show'])->name('bookings.show');
});
Route::get('/user/bookings', [BookingsController::class, 'userBookings'])->name('user.bookings')->middleware('auth');
Route::delete('/bookings/{booking}', [BookingsController::class, 'destroy'])->name('bookings.destroy');
Route::put('/bookings/{booking}/change-status', [BookingsController::class, 'changeStatus'])->name('change_status');
Route::put('/users/{user}/change-role', [BookingsController::class, 'changeRole'])->name('change_role');



require __DIR__.'/auth.php';
