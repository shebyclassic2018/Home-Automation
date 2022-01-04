<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\applianceController;

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
    return view('pages/login');
})->middleware('isLoggedIn');

Route::get("/paypal", function() {
    return view('paypal');
});

Route::get("/graph", function() {
    return view('customer/graph');
});

Route::get("/403_error", function() {
    return view('_error/403_error');
});

Route::get("/chart", function() {
    return view('pages/chart');
});


Route::get('/wifi', [applianceController::class, 'fromDB']);

// LOGIN CONTROLLER URLs
Route::post("/login", [loginController::class, 'login'])->name('login_url');
Route::get("/logout", [loginController::class, 'logout'])->name('logout_url');


// APPLIANCE CONTROLLER URLs
Route::get("/home/{view?}", [applianceController::class, 'index'])->middleware('user_authentication');
Route::post("/delete-appliance}", [applianceController::class, 'deleteAppliance'])->name('deleteApplianceUrl');
Route::post("/gotograph}", [applianceController::class, 'setAppID'])->name('setAppIDUri');
Route::post("/turn_off_on", [applianceController::class, 'turn_appliance_off_on'])->name('turn_appliance_off_on_url');
Route::get("/setting/{view?}", [applianceController::class, 'index'])->name('settingUrl');
Route::get("/savejson/{data?}", [applianceController::class, 'json'])->name('savejsonUrl');
Route::get("/getjson/{data?}", [applianceController::class, 'getJSON'])->name('getjsonUrl');
Route::post("/addAppliance", [applianceController::class, 'addAppliance'])->name('addApplianceUrl');
Route::get("/getApplianceJSON", [applianceController::class, 'applianceTableJSON'])->name('applianceTableJSONUrl');
Route::post("/add", [applianceController::class, 'addAppliance'])->name('addApplianceUr');
Route::post("/getSchedule", [applianceController::class, 'getSchedule'])->name('getScheduleUrl');
Route::post("/insertSchedule", [applianceController::class, 'insertSchedule'])->name('insertScheduleUrl');
Route::post("/validateSchedule", [applianceController::class, 'validateSchedule'])->name('validateScheduleUrl');
