<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//user

Route::post('/create_user', [App\Http\Controllers\UserController::class, 'create'])->name("create_user");
Route::post('/login_user', [App\Http\Controllers\UserController::class, 'loginUser'])->name("login_user");
Route::post('/get_user', [App\Http\Controllers\UserController::class, 'show'])->name("user.show");
//update user
Route::post('/update_user', [App\Http\Controllers\UserController::class, 'update'])->name("user.update");




///Appointments Route
Route::post('/create_appointment', [App\Http\Controllers\AppointmentController::class, 'bookAppointment'])->name("create_appointment");
Route::post('/list_appointments', [App\Http\Controllers\AppointmentController::class, 'index'])->name("appointment.index");
Route::post('/appointment/status', [App\Http\Controllers\AppointmentController::class, 'update'])->name("appointment.status");
Route::post('/appointment/delete', [App\Http\Controllers\AppointmentController::class, 'destroy'])->name("appointment.delete");



///Medication Route
Route::post('/list_medications', [App\Http\Controllers\MedicationController::class, 'index'])->name("medicaion.index");
Route::post('/create_medication', [App\Http\Controllers\MedicationController::class, 'create'])->name("create_prescription");

//////////////////DOCTOR////////////

//create patient

Route::post('/doctor/create_patient', [App\Http\Controllers\DoctorsController::class, 'createUser'])->name("hospital.createuser");
//patients
Route::post('/doctor/patients', [App\Http\Controllers\DoctorsController::class, 'getPatients'])->name("doctor.patients");


///////////////////////HOSPIAL/////////////////////

///get all Doctors
Route::post('/hospital/doctors', [App\Http\Controllers\HospitalController::class, 'getDoctors'])->name("hospital.doctors");
//DocTORS patients
Route::post('/hospital/patients', [App\Http\Controllers\HospitalController::class, 'getPatients'])->name("hospital.patients");
//create doctor or patient
Route::post('/hospital/create_user', [App\Http\Controllers\HospitalController::class, 'createUser'])->name("hospital.createuser");
///get doctors
Route::post('/doctors', [App\Http\Controllers\DoctorsController::class, 'getDoctors'])->name("doctors.getDoctors");

///wallet
//fundWallet
Route::post('/fund_wallet', [App\Http\Controllers\TransactionsController::class, 'fundWallet'])->name("wallet.fund");







///////////////////////ADMIN/////////////////////




///Admin
Route::post('/admin/users', [App\Http\Controllers\UserController::class, 'index'])->name("user.index");










Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
