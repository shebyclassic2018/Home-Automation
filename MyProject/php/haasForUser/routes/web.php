<?php

use Illuminate\Support\Facades\Route;
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
    return view('index');
});

Route::get("/paypal", function() {
    return view('paypal');
});

Route::get("/graph", function() {
    return view('customer/graph');
});
Route::get("/subscribe", function() {
    return view('customer/subscribe');
});
Route::get('/wifi', [applianceController::class, 'fromDB']);


// APPLIANCE CONTROLLER URLs
Route::get("/home/{view?}", [applianceController::class, 'index']);
Route::post("/turn_off_on", [applianceController::class, 'turn_appliance_off_on'])->name('turn_appliance_off_on_url');
Route::get("/setting/{view?}", [applianceController::class, 'index'])->name('settingUrl');
Route::post("/addAppliance", [applianceController::class, 'addAppliance'])->name('addApplianceUrl');
Route::get("/getApplianceJSON", [applianceController::class, 'applianceTableJSON'])->name('applianceTableJSONUrl');
Route::post("/add", [applianceController::class, 'addAppliance'])->name('addApplianceUr');
Route::post("/getSchedule", [applianceController::class, 'getSchedule'])->name('getScheduleUrl');
Route::post("/insertSchedule", [applianceController::class, 'insertSchedule'])->name('insertScheduleUrl');
