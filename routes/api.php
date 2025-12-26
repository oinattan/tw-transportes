<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\EtapaController;
use App\Http\Controllers\FreteController;
use Illuminate\Support\Facades\Route;

Route::get('/ola',function(){
    return "Olá Mundo";
});

Route::post('/clients',[ClientController::class,'store']);
Route::post('/fretes',[FreteController::class,'store']);
Route::post('/etapas',[EtapaController::class,'store']);