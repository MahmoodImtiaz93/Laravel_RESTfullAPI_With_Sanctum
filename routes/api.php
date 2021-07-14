<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\StudentsAuthController;
use App\Http\Controllers\Api\FirstTableContorller;


// Public Route
Route::post('/register',[StudentsAuthController::class,'register']);
Route::post('/login',[StudentsAuthController::class,'login']);
Route::get('/students',[StudentsController::class,'Index']);
Route::get('/students/{id}',[StudentsController::class,'show']);
Route::get('/students/search/{name}',[StudentsController::class,'search']);




// There is no auth then we can use this mathod to hit

// For all the route
//Route::resource('students',StudentsController::class);

//Protected Route
Route::group(['middleware'=>['auth:sanctum']],function () {
    Route::post('/students',[StudentsController::class,'store']);
    Route::put('/students/{id}',[StudentsController::class,'update']);
    Route::delete('/students/{id}',[StudentsController::class,'destroy']);
    Route::post('/logout',[StudentsAuthController::class,'logout']);

});
