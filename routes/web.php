<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PatientListController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ProfileController;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [FrontendController::class, 'index']);

Route::get('/new-appointment/{doctorId}/{date}', [FrontendController::class, 'show'])->name('create.appointment');

Route::group(['middleware'  => ['auth', 'patient']], function () {
    Route::post('/book/appointment', [FrontendController::class, 'store'])->name('booking.appointment');
    Route::get('/my-booking', [FrontendController::class, 'myBookings'])->name('my.booking');

    Route::get('/user-profile', [ProfileController::class, 'index']);
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::post('/profile-pic', [ProfileController::class, 'profilePic'])->name('profile.pic');
    Route::get('/my-prescription', [ProfileController::class, 'myPrescriptions'])->name('my.prescription');

});

Route::get('/dashboard', [DashboardController::class, 'index']);




Route::get('/test', function () {
    return view('test');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'  => ['auth', 'admin']], function () {
    Route::resource('/doctor', DoctorController::class);
    Route::get('/patients', [PatientListController::class, 'index'])->name('patient');
    Route::get('/patients/all', [PatientListController::class, 'allTimeAppointment'])->name('all.appointments');
    Route::get('/status/update/{id}', [PatientListController::class, 'toggleStatus'])->name('update.status');

    Route::resource('department', DepartmentController::class);
});

Route::group(['middleware'  => ['auth', 'doctor']], function () {

    Route::resource('appointment', AppointmentController::class);

    Route::post('appointment/check', [AppointmentController::class, 'check'])->name('appointment.check');
    Route::post('appointment/update', [AppointmentController::class, 'updateTime'])->name('update');
    Route::get('patient-today', [PrescriptionController::class, 'index'])->name('patients.today');
    Route::post('prescription', [PrescriptionController::class, 'store'])->name('prescription');
    Route::get('prescription/{userId}/{date}', [PrescriptionController::class, 'show'])->name('prescription.show');
    Route::get('prescribed-patients', [PrescriptionController::class, 'patientsFromPrescription'])->name('prescribed.patients');


});

