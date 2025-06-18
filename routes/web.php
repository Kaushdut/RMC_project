<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MeteoController;
use App\Http\Controllers\ObserverController;
use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Login (if you're using your own login page instead of Breeze's default)
Route::get('/login', [AuthController::class, 'loginpage'])->name('login');
Route::post('/loginsubmit', [AuthController::class, 'addUser'])->name('login.submit');

require __DIR__.'/auth.php'; // Required for Breeze authentication (login, registration, etc.)

/*
|--------------------------------------------------------------------------
| Authenticated User Routes (All users)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

     //Common dashboard after login (you can redirect based on role from controller)
   Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // User profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Role-Based Dashboards (Protected by auth)
|--------------------------------------------------------------------------
*/
Route::get('/test-role', function () {
    return 'Role middleware is working!';
})->middleware('role:admin');

Route::middleware(['auth','role:admin'])->group(function () {

    // 🔹 Admin
    Route::get('/admin', [AdminController::class, 'admindashboard'])->name('admin.dashboard');
    Route::get('/adminpro', [AdminController::class, 'adminprofile'])->name('admin.profile');
    //User Table
    Route::get('/users',[AdminController::class,'getUsers']);
    Route::view('/adminInput','admin.adminInput');
    Route::post('/adminInput',[AdminController::class,'addUsers']);
    Route::delete('/admin/users/{id}',[AdminController::class,'destroy'])->name('admin.users.destroy');
    Route::get('edit/{id}',[AdminController::class,'update'])->name('admin.edit.update');
    Route::put('editUser/{id}',[AdminController::class,'edit'])->name('admin.editUser.edit');
    //Station Table
    Route::get('/stationView',[AdminController::class,'getStation']);
    Route::view('/addStation','admin.addStation');
    Route::post('/addStation',[AdminController::class,'addStations']);
});
Route::middleware(['auth','role:meteorologist'])->group(function () {
    // 🔹 Meteorologist
    Route::get('/meteorologist', [MeteoController::class, 'meteodashboard'])->name('meteo.dashboard');
    Route::get('/meteorologistpro', [MeteoController::class, 'meteoprofile'])->name('meteo.profile');
       Route::get('/meteorologistobservation', [MeteoController::class, 'observation'])->name('meteo.observation');
     
         Route::get('/meteorologistfilter1', [MeteoController::class, 'report'])->name('meteo.filter');
     

});
Route::middleware(['auth','role:observer'])->group(function () {
    // 🔹 Observer
    Route::get('/observer', [ObserverController::class, 'observerdashboard'])->name('observer.dashboard');
    Route::get('/observerpro', [ObserverController::class, 'observerprofile'])->name('observer.profile');
    Route::post('/observersubmit', [ObserverController::class, 'addObserver'])->name('observer.submit');
   
});



  // Route::get('/admin', [AdminController::class, 'admindashboard'])->middleware('check1');