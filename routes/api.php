<?php

use App\Http\Controllers\Api\V1\BrandController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::apiResource('V1/brands',BrandController::class);

Route::get('V1/deleteList',[BrandController::class,'deleteList']);   //show deleted record
