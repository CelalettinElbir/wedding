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



Route::controller(authcontroller::class)->prefix('user')->name("user.")->group(function () {

    Route::middleware(["guest:web"])->group(function () {
        Route::get('/register', 'create')->name("register");
        Route::post('/register', 'store');
        Route::get("/login", "login")->name("login");
        Route::post("/login", "authenticate");
    });

    Route::middleware(["auth:web"])->group(function () {
        Route::post("/logout", "logout")->name("logout");
    });
});



Route::controller(CompanyController::class)->prefix('company')->name("company.")->group(function () {


    Route::middleware(["auth:company"])->group(function () {
        route::get("/home", "home")->name("home");
        route::get("/{company}/edit", "edit")->name("edit");
        Route::post("/logout", "logout")->name("logout");
    });


    Route::middleware(["guest:company"])->group(function () {
        route::get("/login", "companyLogin")->name("login");
        route::post("/login", "companyAuth")->name("auth");
        route::get("/create", "create")->name("create");
        route::get("/", "index")->name("index");
        route::post("/create", "store");
        route::get("/{company}", "show")->name("detail");
    });
});





route::controller(FavoriteController::class)->group(function () {
    route::post("/company/favorite/{company}", "store")->name("add-favorite")->middleware('auth');
    Route::get("/user/favorites", "index")->name("index-favorites")->middleware('auth');
    Route::delete("/user/favorites/{company}", "destroy")->name("favorite-delete")->middleware('auth');;
});


Route::controller(adminController::class)->group(function () {
    Route::get("/admin/panel", "deneme");
});


Route::controller(serviceController::class)->group(function () {
    route::get("/company/service/create", "create")->name("create_services");
    route::post("/company/service/create", "store")->name("store-service");
});
