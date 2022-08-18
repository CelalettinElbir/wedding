<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\serviceController;

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
    Route::get("/user/login", "login")->name("login");
    Route::post("/user/login", "authenticate");
    Route::post("/user/logout", "logout")->name("logout");

});

Route::controller(CompanyController::class)->group(function () {
    route::get("/company/create", "create");
    route::get("/company", "index");
    route::get("/company/{company}", "show")->name("company-detail");
    route::post("/company/create", "store");
});

route::controller(FavoriteController::class)->group(function () {
    route::post("/company/favorite/{company}", "store")->name("add-favorite")->middleware('auth');
    Route::get("/user/favorites","index")->name("index-favorites")->middleware('auth');
    Route::delete("/user/favorites/{company}","destroy")->name("favorite-delete")->middleware('auth');;


   
});





Route::controller(adminController::class)->group(function () {
    Route::get("/admin/panel","deneme");
  


}); 


Route::controller(serviceController::class)->group(function (){
    route::get("/company/service/create","create");
    route::post("/company/service/create","store")->name("store-service");

});