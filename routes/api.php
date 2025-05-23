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

///SECURED BY MIDWARE TO ALLOW ONLY MEDLIFELINK.COM TO MAKE REQUEST
Route::middleware('RestrictByDomain')->group(function () {

//user

Route::post('/create_user', [App\Http\Controllers\UserController::class, 'create'])->name("create_user");
Route::post('/login_user', [App\Http\Controllers\UserController::class, 'loginUser'])->name("login_user");
Route::post('/get_user', [App\Http\Controllers\UserController::class, 'show'])->name("user.show");
//update user
Route::post('/update_user', [App\Http\Controllers\UserController::class, 'update'])->name("user.update");
Route::post('/user/update_prof_info', [App\Http\Controllers\UserController::class, 'updateProfessionalInfo'])->name("user.update_prof_info");
Route::post('/user/update_password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name("user.update_password");
Route::post('/user/forgotpassword', [App\Http\Controllers\UserController::class, 'forgotPassword'])->name("user.forgotpassword");

Route::post('/user/changePassword', [App\Http\Controllers\UserController::class, 'changePassword'])->name("user.changePassword");
Route::post('/user/updateany', [App\Http\Controllers\UserController::class, 'updateAny'])->name("user.updateany");
Route::post('/user/updatephoto', [App\Http\Controllers\UserController::class, 'updatePhoto'])->name("user.updatePhoto");



Route::post('/otp/confirm', [App\Http\Controllers\UserController::class, 'confirmOTP'])->name("user.changePassword");










///Appointments Route
Route::post('/appointment/create', [App\Http\Controllers\AppointmentController::class, 'bookAppointment'])->name("create_appointment");
Route::post('/appointment/list', [App\Http\Controllers\AppointmentController::class, 'index'])->name("appointment.index");
Route::post('/appointment/status', [App\Http\Controllers\AppointmentController::class, 'updateStatus'])->name("appointment.status");
Route::post('/appointment/delete', [App\Http\Controllers\AppointmentController::class, 'destroy'])->name("appointment.delete");

Route::post('/appointment/cancel', [App\Http\Controllers\AppointmentController::class, 'cancel'])->name("appointment.cancel");
Route::post('/appointment/update', [App\Http\Controllers\AppointmentController::class, 'update'])->name("appointment.update");
Route::post('/appointment/reschedule', [App\Http\Controllers\AppointmentController::class, 'reschedule'])->name("appointment.reschedule");

Route::post('/appointment/active', [App\Http\Controllers\AppointmentController::class, 'activeAppointments'])->name("appointment.active");
Route::post('/appointment/recent', [App\Http\Controllers\AppointmentController::class, 'recentAppointments'])->name("appointment.recent");
Route::get('/appointment/all/{user_id}', [App\Http\Controllers\AppointmentController::class, 'getAll'])->name("appointment.getAll");







///Medication Route
Route::post('/medications/list', [App\Http\Controllers\MedicationController::class, 'index'])->name("medicaion.index");
Route::post('/medication/create', [App\Http\Controllers\MedicationController::class, 'create'])->name("create_prescription");

//////////////////DOCTOR////////////

//create patient

Route::post('/doctor/create_patient', [App\Http\Controllers\DoctorsController::class, 'createUser'])->name("hospital.createuser");
//patients
Route::post('/doctor/patients', [App\Http\Controllers\DoctorsController::class, 'getPatients'])->name("doctor.patients");
///get patients doctors
Route::post('/patients/doctor', [App\Http\Controllers\DoctorsController::class, 'getPatientsDoctor'])->name("patients.doctors");
//Withdraw
Route::post('/doctors/withdraw', [App\Http\Controllers\TransactionsController::class, 'withdrawal'])->name("user.withdrawal");
///activation fee
Route::post('/doctors/activate', [App\Http\Controllers\DoctorsController::class, 'activateDoctor'])->name("doctors.activate");





///////////////////////HOSPIAL/////////////////////

///get all Doctors
Route::post('/hospital/doctors', [App\Http\Controllers\HospitalController::class, 'getDoctors'])->name("hospital.doctors");
//DocTORS patients
Route::post('/hospital/patients', [App\Http\Controllers\HospitalController::class, 'getPatients'])->name("hospital.patients");
//create doctor or patient
Route::post('/hospital/create_user', [App\Http\Controllers\HospitalController::class, 'createUser'])->name("hospital.createuser");
///get doctors
Route::post('/doctors', [App\Http\Controllers\DoctorsController::class, 'getDoctors'])->name("doctors.getDoctors");

///Update Doctors profesional Details
Route::post('/doctors/professional_details', [App\Http\Controllers\DoctorsController::class, 'getProfessioalDetails'])->name("doctors.professional_details");
///Update Doctors profesional Details
Route::post('/doctors/update_professional_details', [App\Http\Controllers\DoctorsController::class, 'updateProfessioalDetails'])->name("doctors.update_professional_details");





///wallet
//fundWallet
Route::post('/fund_wallet', [App\Http\Controllers\TransactionsController::class, 'fundWallet'])->name("wallet.fund");
///transactions
Route::get('/user/transactions/{user_id}', [App\Http\Controllers\TransactionsController::class, 'userTransactions'])->name("user.transactions");
//approve transactions
Route::post('/transactions/approve', [App\Http\Controllers\TransactionsController::class, 'approveTransaction'])->name("transaction.approve");
//decline transactions
Route::post('/transactions/decline', [App\Http\Controllers\TransactionsController::class, 'declineTransaction'])->name("transaction.decline");
Route::get('/transactions/all/{user_id}', [App\Http\Controllers\TransactionsController::class, 'getAllTransactions'])->name("transactions.all");



///Rating Endpoinst
//Doctors and patient Rating
Route::post('/ratings', [App\Http\Controllers\RatingController::class, 'getRatings'])->name("ratings.get");
Route::post('/rate/doctor', [App\Http\Controllers\RatingController::class, 'rateDoctor'])->name("doctor.rate");
Route::post('/rate/patient', [App\Http\Controllers\RatingController::class, 'ratePatient'])->name("patient.rate");












//test mail
Route::post('/send', [App\Http\Controllers\SendMailController::class, 'index'])->name("mail.index");




////Subscribers ApI

Route::get('/subscribers/{user_id}', [App\Http\Controllers\SubscriberController::class, 'index'])->name("subscriber.index");
Route::post('/subscriber/create', [App\Http\Controllers\SubscriberController::class, 'store'])->name("subscriber.create");
Route::post('/subscriber/delete', [App\Http\Controllers\SubscriberController::class, 'destroy'])->name("subscriber.delete");
Route::get('/subscriber/unsubscribe/{email}', [App\Http\Controllers\SubscriberController::class, 'unsubscribe'])->name("subscriber.unsubscribe");

////Contact ApI

Route::get('/contact/{user_id}', [App\Http\Controllers\ContactController::class, 'index'])->name("contact.index");
Route::post('/contact/create', [App\Http\Controllers\ContactController::class, 'store'])->name("contact.create");
Route::post('/contact/delete', [App\Http\Controllers\ContactController::class, 'destroy'])->name("contact.delete");


////webite setting ApI

Route::post('/website/settings', [App\Http\Controllers\WebsiteSettingsController::class, 'index'])->name("website.index");
Route::post('/website/update', [App\Http\Controllers\WebsiteSettingsController::class, 'update'])->name("website.update");
Route::post('/website/updateany', [App\Http\Controllers\WebsiteSettingsController::class, 'updateAny'])->name("website.updateany");



///ADMIN ROUTES
Route::post('/admin/onboard_doctor', [App\Http\Controllers\AdminController::class, 'onboardDoctor'])->name("admin.onboard_doctor");


//PLAN SUBSCRIPTIONS
Route::post('/plan/subscribe', [App\Http\Controllers\PlanSubscriptionController::class, 'subscribeToPlan'])->name("plan.subscribe");
Route::post('/plan/subscribers', [App\Http\Controllers\PlanSubscriptionController::class, 'subscribers'])->name("plan.users");
Route::post('/plan/subscriptions', [App\Http\Controllers\PlanSubscriptionController::class, 'userSubscripions'])->name("plan.users.userSubscripions");


Route::get('/plan/all', [App\Http\Controllers\PlanController::class, 'index'])->name("plan.all");




//VIDEO CALL LOGS
Route::post('/callogs/all', [App\Http\Controllers\VideoCallLogController::class, 'index'])->name("calllogs.index");
Route::post('/callogs/create', [App\Http\Controllers\VideoCallLogController::class, 'store'])->name("calllogs.store");
Route::post('/callogs/get', [App\Http\Controllers\VideoCallLogController::class, 'findById'])->name("calllogs.get");
Route::get('/callogs/get/{user_id}', [App\Http\Controllers\VideoCallLogController::class, 'getUserCallLogs'])->name("calllogs.getAll");



Route::patch('/callogs/check', [App\Http\Controllers\VideoCallLogController::class, 'check'])->name("calllogs.check");





















///////////////////////ADMIN/////////////////////




///Admin
Route::post('/admin/users', [App\Http\Controllers\UserController::class, 'index'])->name("user.index");










Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





});
