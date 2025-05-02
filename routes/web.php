<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\WayController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\ClientReportController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;



   //route for admin login
    Route::resource("/login",AuthenticatedSessionController::class);


    //middleware all admin route 
Route::middleware(['role:1'])->group(function () {
    //route for category
    Route::resource("/product",ProductController::class);
    Route::resource("/",ProductController::class);
    //route for product
    Route::resource("/category",CatController::class);
    //route for category
    Route::resource("/outlet",OutletController::class);
    //route for way
    Route::get("/way",[WayController::class, 'index']);
    Route::get("/way/detail",[WayController::class, 'detail']);
    Route::get("/way/{way}",[WayController::class,'edit']);
    Route::post("/way/{way}/update",[WayController::class,'update']);
      //route for order admin  view
    Route::get('/order',[OrderController::class,'index']); 
    Route::get("/order/{outlet}/detail",[OrderController::class,'detail']);
    Route::get('/report',[OrderController::class,'report']);
    Route::post('/report/detail',[OrderController::class,'report_detail']);
    //route for user
    Route::resource("/user",UserController::class);
    Route::get("/data",[DataController::class,'index']);
    Route::get('/data/user',[DataController::class,'user']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    //route for client
    Route::resource("/client/login",ClientAuthController::class);

    //middleware for client
Route::middleware(['client'])->group(function () {

    //route for client
    Route::get("/client",[ClientController::class,'home']);
    Route::get("/client/{outlet}/product",[ClientController::class,'product']);
    Route::post("/client/order",[ClientController::class,'order']);
    Route::get("/client/orderlist",[ClientController::class,'order_list']);
    Route::get("/client/upload",[ClientController::class,'upload']);
    Route::get("/client/test",[ClientController::class,'updateData']);
    Route::get('/client/report',[ClientReportController::class,'index']);
});

Route::get('/migrate', function () {
    Artisan::call('migrate --force');
    return "Migrations are complete.";
});


require __DIR__.'/auth.php';
