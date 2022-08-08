<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\homeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


route::get("/", [homeController::class, "index"])->name("home");



Route::controller(authcontroller::class)->group(function () {
    Route::get('/user/register', 'create');
    Route::post('/user/register', 'store');
    Route::get("/user/login", "login");
    Route::post("/user/login", "authenticate");
    Route::post("/user/logout", "logout");
});

Route::controller(CompanyController::class)->group(function () {
    route::get("/company", "index");
    route::get("/company/{company}", "show");
});
