<?php

use Illuminate\Support\Facades\Route;

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

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/

require __DIR__.'/auth.php';



//Users Routes:
    use App\Http\Controllers\UserController;
    Route::controller(UserController::class)->group(function(){
       Route::get('/cleaners', 'index');
       Route::get('/users/{id}', 'show');
       Route::post('/users/{id}', 'update');
       Route::post('/users/{id}/update-pp', 'updateProfilePicture');
       Route::delete('/users/delete/{id}', 'destroy')->middleware('isAdmin');
    });

//Admin Routes:
    use App\Http\Controllers\AdminController;
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin', 'index')->middleware('isAdmin');
        Route::get('/admin/cleaners', 'indexForCleaners')->middleware('isAdmin');
        Route::get('/admin/users', 'indexForUsers')->middleware('isAdmin');
    });

//Author Routes:
    use App\Http\Controllers\AuthorController;
    Route::controller(AuthorController::class)->group(function(){
    
    });


//Orders Routes:
    use App\Http\Controllers\OrderController;
    Route::controller(OrderController::class)->group(function(){
        Route::get('/rent/{id}', 'create');
        Route::post('/rent/{id}', 'store');
        Route::get('/my-orders', 'indexForCleaner');
        Route::get('/orders-change-stat/{id}', 'updateForCleaner');
        Route::delete('/order/delete/{id}', 'destroy')->middleware('isAdmin');
        Route::get('/track-my-orders', 'indexForCustomer');
    });

//Review Routes:
    use App\Http\Controllers\ReviewController;
    Route::controller(ReviewController::class)->group(function(){
   
    });

//Services Routes:
    use App\Http\Controllers\ServiceController;
    Route::controller(ServiceController::class)->group(function(){

    });

//FAQs route:
    Route::get('/faq', function(){
        return view('FAQ');
    });

//How it work route:
    Route::get('/how-it-work', function(){
        return view('howitwork');
    });

/*
//Welcome Page route:
    Route::get('/welcome', function(){
        return view('welcome');
    });
*/
