<?php

use App\Models\temperature;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::match(['get', 'post'], '/temp-data', function() {
    $user_id = 1;
    $temp = temperature::where('user_id', $user_id)
            ->select('room_temperature as tmp')
            ->get();
    foreach ($temp as $tmp) {
        $tmp = $tmp->tmp;
    }
    return floor($tmp);
})->name('temp_data_url');
