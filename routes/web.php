<?php

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


// Simulation the login in
//auth()->loginUsingId(1);




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home')
    ->middleware("auth");

//Forrás:  https://laracasts.com/series/laravel-6-from-scratch/episodes/54
Route::get('/reports', function () {
    return 'the secret reports';
})->middleware('can:view_reports');


// Forrás: https://laravel.com/docs/6.x/routing#route-group-middleware
Route::middleware("auth")->group(function () {

/* V1
    Route::get("/cars", "CarsController@index")->name("car.index");

    Route::post("/cars/new", "CarsController@store")->name("car.store");
    Route::get('/cars/create', "CarsController@create")->name("car.create");


    Route::get("/cars/{car}", "CarsController@show")->name("car.show");

    Route::get("/cars/{car}/edit", "CarsController@edit");
    Route::put("/cars/{car}", "CarsController@update");

    */

/*
Route::resources - request cheat sheet:
    GET /cars2 (index)
    GET /cars2/create (create)
    GET /cars2/{id} (show)
    POST /cars2 (store)
    GET /cars2/{id}/edit (edit)
    PATCH /cars2/update (update)
    DELETE /cars2/{id} (destroy)
*/

/* V2 */
    Route::resource('cars2','Car2Controller');

    Route::get("/user/{user}/edit/", "UsersController@edit")->name("user.edit");


});


Route::middleware("can:edit_forum")->group(function () {
   Route::get("/user/", "UsersController@index")->name("user.index");

    Route::get("/user/{user}", "UsersController@show")->name("user.show");

   // Route::get("/user/{user}/edit/", "UsersController@edit")->name("user.edit");

    Route::put("/user/{user}", "UsersController@update")->name("user.update");
    Route::delete("/user/{user}", "UsersController@destroy")->name("user.destroy");

    /* JSON  - only json.index path available */

    Route::resource('json','JSONController');

});
