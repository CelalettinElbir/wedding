<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\companyImageController;
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


Route::get("/", [homeController::class, "index"])->name("home");



Route::controller(authcontroller::class)->prefix('user')->name("user.")->group(function () {


    Route::get('/register', 'create')->name("register");
    Route::post('/register', 'store');
    Route::get("/login", "login")->name("login");
    Route::post("/login", "authenticate");
    Route::post("/logout", "logout")->name("logout");
});



Route::controller(CompanyController::class)->prefix('company')->name("company.")->group(function () {


    route::get("/home", "home")->name("home");
    route::get("/{company}/edit", "edit")->name("edit")->middleware('company');
    route::post("/logout", "logout")->name("logout");
    route::put("/{company}", "update")->name("update");
    route::delete("/{company}", "destroy")->name("delete");


    route::get("/login", "companyLogin")->name("login");
    route::post("/login", "companyAuth")->name("auth");
    route::get("/create", "create")->name("create");
    route::get("/", "index")->name("index");
    route::post("/create", "store");
    route::get("/{company}", "show")->name("detail");
});





route::controller(FavoriteController::class)->middleware("auth")->group(function () {
    route::post("/company/favorite/{company}", "store")->name("add-favorite");
    Route::get("/user/favorites", "index")->name("index-favorites");
    Route::delete("/user/favorites/{company}", "destroy")->name("favorite-delete");
});


Route::controller(adminController::class)->group(function () {
    Route::get("/admin/panel", "deneme");
});


Route::controller(serviceController::class)->prefix("company")->name("service.")->group(function () {
    route::get("/service/create", "create")->name("create");
    route::post("/service/create", "store")->name("store");

    route::get("/service/{company}/edit", "edit")->name("edit");

    route::put("/service/service","update")->name("update");
    route::delete("service/delete", "destroy")->name("destroy");
});

route::controller(companyImageController::class)->group(function () {
    route::delete("/company/images/delete", "destroy")->name("delete-images");
});
